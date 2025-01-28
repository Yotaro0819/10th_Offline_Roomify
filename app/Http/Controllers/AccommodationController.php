<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accommodation;
use App\Models\Category;
use App\Models\Hashtag;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AccommodationController extends Controller
{
    private $accommodation;
    private $category;
    private $hashtag;



    public function __construct(Accommodation $accommodation, Category $category, Hashtag $hashtag)
    {
        $this->accommodation = $accommodation;
        $this->category      = $category;
        $this->hashtag       = $hashtag;

    }



    public function create()
    {

        $all_categories = Category::all();
        return view('accommodation.create')->with('all_categories', $all_categories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:1|max:100',
            'description' => 'required|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,jpg,png,gif|max:1048',

        ]);

        // リクエストから宿泊施設名と住所を取得
        $user_id = Auth::user()->id;
        $name = $validated['name'];
        $address = $validated['address'];
        $city = $validated['city'];
        $price = $validated['price'];
        $capacity = $validated['capacity'];
        $description = $validated['description'];
        $apiKey = config('services.google_maps.api_key');



        try {
            // Google Geocoding APIを使用して緯度と経度、住所コンポーネントを取得
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $address,
                'key' => $apiKey
            ]);

            $data = $response->json();

            if ($data['status'] == 'OK') {
                // 緯度・経度を取得
                $latitude = $data['results'][0]['geometry']['location']['lat'];
                $longitude = $data['results'][0]['geometry']['location']['lng'];

                $accommodation = Accommodation::create([
                    'user_id' => $user_id,
                    'name' => $name,
                    'address' => $address,
                    'city' => $city,
                    'price' => $price,
                    'capacity' => $capacity,
                    'description' => $description,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);


                if(!empty($validated['description'])) {
                    preg_match_all('/#(\w+)/', $validated['description'], $matches);
                    $tags = $matches[1];

                    $tagIds = [];
                    foreach($tags as $tagName) {
                        // 'name' カラムを使ってタグを作成または取得
                        $tag = Hashtag::firstOrCreate(['name' => $tagName]);
                        $tagIds[] = $tag->name; // ここでは 'id' ではなく 'name' を使う
                    }

                    $accommodation->hashtags()->attach($tagIds);
                }

                if ($request->hasFile('photos')) {
                    foreach ($request->file('photos') as $photo) {
                        // 各写真を保存
                        $path = $photo->store('photos', 'public');

                        // Photoモデルで保存
                        Photo::create([
                            'accommodation_id' => $accommodation->id,
                            'image' => $path,
                        ]);
                    }
                }

                $category_accommodation = [];
                foreach ($request->category as $category_id) {
                    $category_accommodation[] = [
                        'category_id' => $category_id,
                        'accommodation_id' => $accommodation->id
                    ];
                }

                DB::table('category_accommodation')->insert($category_accommodation);

                return redirect()->route('accommodation.show', $accommodation->id)
                    ->with('success', '宿泊施設が登録されました');
            } else {
                return response()->json(['error' => '住所のジオコーディングに失敗しました。', 'details' => $data], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'エラーが発生しました。', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        $accommodation = $this->accommodation->findOrFail($id);

        if(Auth::user()->id != $accommodation->user->id){
            return redirect()->route('host.index');
        }

        $all_categories = $this->category->all();
        $all_hashtags = $this->hashtag->all();

        $selected_categories = [];
        foreach($accommodation->categoryAccommodation as $category_accommodation) {
            $selected_categories[] = $category_accommodation->category_id;
        }

        return view('accommodation.edit')
                ->with('accommodation', $accommodation)
                ->with('all_categories', $all_categories)
                ->with('selected_categories', $selected_categories)
                ->with('all_hashtags', $all_hashtags);

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:1|max:100',
            'description' => 'required|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,jpg,png,gif|max:1048',
        ]);



        try {
            // 対象の宿泊施設を取得
            $accommodation = Accommodation::findOrFail($id);

            // リクエストから宿泊施設の情報を更新
            $user_id = Auth::user()->id;
            $name = $validated['name'];
            $address = $validated['address'];
            $city = $validated['city'];
            $price = $validated['price'];
            $capacity = $validated['capacity'];
            $description = $validated['description'];
            $apiKey = config('services.google_maps.api_key');

            // 住所が変更された場合、緯度・経度も更新
            if ($accommodation->address != $validated['address']) {
                $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                    'address' => $validated['address'],
                    'key' => $apiKey
                ]);
                $data = $response->json();
                if ($data['status'] == 'OK') {
                    $accommodation->latitude = $data['results'][0]['geometry']['location']['lat'];
                    $accommodation->longitude = $data['results'][0]['geometry']['location']['lng'];
                }
            }

            // 宿泊施設の情報を更新
            $accommodation->update([
                'user_id' => $user_id,
                'name' => $name,
                'address' => $address,
                'city' => $city,
                'price' => $price,
                'capacity' => $capacity,
                'description' => $description,
                'latitude' => $accommodation->latitude,
                'longitude' => $accommodation->longitude,
            ]);

            // タグの更新処理
            if (!empty($validated['description'])) {
                preg_match_all('/#(\w+)/', $validated['description'], $matches);
                $tags = $matches[1];

                $tagIds = [];
                foreach ($tags as $tagName) {
                    $tag = Hashtag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id; // 'id' を使用
                }

                // 既存のタグを削除して、新しいタグを追加
                $accommodation->hashtags()->sync($tagIds);
            }

            // 写真のアップロード処理
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    // 各写真を保存
                    $path = $photo->store('photos', 'public');

                    // Photoモデルで保存
                    Photo::create([
                        'accommodation_id' => $accommodation->id,
                        'image' => $path,
                    ]);
                }
            }

           // カテゴリの関連付け
        $category_accommodation = [];
        foreach ($request->category as $category_id) {
            $category_accommodation[] = $category_id;
        }

        // 既存のカテゴリ関連を同期（重複なし）
        $accommodation->categories()->sync($category_accommodation);


            // 成功メッセージと共にリダイレクト
            return redirect()->route('accommodation.show', $accommodation->id)
                ->with('success', '宿泊施設が更新されました');
        } catch (\Exception $e) {
            return response()->json(['error' => 'エラーが発生しました。', 'message' => $e->getMessage()], 500);
        }
    }




    public function show($id)
    {
        $accommodation = Accommodation::with('photos')->findOrFail($id);

        return view('accommodation.show', compact('accommodation'));

    }

    public function index()
    {
        // $user = Auth::user();
        $all_accommodations = $this->accommodation->where('user_id', Auth::user()->id)->latest()->paginate(3);

        // return $all_accommodations;

        return view('acm_index_host')->with('all_accommodations', $all_accommodations);
    }

    public function destroy($id)
    {
        $accommodation = $this->accommodation->findOrFail($id);

        $photos = Photo::where('accommodation_id', $id)->get();

        foreach ($photos as $photo) {
            if ($photo->image && file_exists(storage_path('app/public/' . $photo->image))) {
                unlink(storage_path('app/public/' . $photo->image));
            }
        }

        Photo::where('accommodation_id', $id)->delete();

        $accommodation->delete();

        return redirect()->route('host.index');
    }
}

