<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accommodation;
use App\Models\Category;
use App\Models\Hashtag;
use App\Models\Review;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AccommodationController extends Controller
{

    // master push
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



                // if ($request->hasFile('photos')) {
                //     foreach ($request->file('photos') as $photo) {
                //         // 各写真を保存
                //         $path = $photo->store('photos', 'public');

                //         // Photoモデルで保存
                //         Photo::create([
                //             'accommodation_id' => $accommodation->id,
                //             'image' => $path,
                //         ]);
                //     }
                // }

                if ($request->hasFile('photos')) {
                    foreach ($request->file('photos') as $photo) {
                        // ファイルの拡張子を取得
                        $extension = $photo->getClientOriginalExtension();

                        // ユニークなファイル名を生成（UUIDを使用）
                        $newFileName = Str::uuid() . '.' . $extension;

                        // 画像を保存（storage/app/public/photos に保存）
                        $path = $photo->storeAs('photos', $newFileName, 'public');

                        // Photoモデルに保存
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
                return redirect()->route('host.accommodation.create')->with('googleMap_Error', 'Something went wrong with the address.');
            }
        } catch (\Exception $e) {
            return redirect()->route('host.accommodation.create')->with('googleMap_Error', 'Something went wrong with the address.');
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
            'photos' => 'nullable|array|min:4',
            'photos.*' => 'image|mimes:jpeg,jpg,png,gif,webp|max:1048',
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
                // #タグを抽出
                preg_match_all('/#(\w+)/', $validated['description'], $matches);
                $tags = $matches[1];

                // #タグを取り除いてdescriptionを更新
                $descriptionWithoutTags = preg_replace('/#\w+/', '', $validated['description']);
                $accommodation->description = trim($descriptionWithoutTags); // 前後の不要なスペースを削除
                $accommodation->save();

                // タグを処理
                $tagIds = [];
                foreach ($tags as $tagName) {
                    // タグ名が空でないか確認
                    if (!empty($tagName)) {
                        // 'name' カラムを使ってタグを作成または取得
                        $tag = Hashtag::firstOrCreate(['name' => $tagName]);
                        $tagIds[] = $tag->id; // タグのIDを保存
                    }
                }
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
            return redirect()->route('host.accommodation.create')->with('googleMap_error', 'Something went wrong with the address.');
        }
    }




    public function show($id)
    {
        $accommodation = Accommodation::with('photos')->findOrFail($id);
        $reviews = Review::latest()->get();
        $latest_review = Review::latest()->first();


        return view('accommodation.show', compact('accommodation', 'reviews', 'latest_review'));

    }

    public function pictureIndex($id)
    {
        $accommodation = Accommodation::with('photos')->findOrFail($id);

        return view('accommodation.pictures', compact('accommodation'));
    }


    public function index()
    {
        $all_accommodations = $this->accommodation->where('user_id', Auth::user()->id)->latest()->paginate(3);

        return view('acm_index_host')->with('all_accommodations', $all_accommodations);
    }

    public function search()
    {
        $accommodations =  $this->accommodation->get();
        $categories     =  $this->category->get();

        return view('accommodation.search')->with('accommodations', $accommodations)
                                                 ->with('categories', $categories);
    }

    public function search_by_keyword(Request $request)
    {
        $accommodations = $this->accommodation
                    ->where('address', 'LIKE', '%'. $request->keyword . '%')
                    ->orWhere('name', 'LIKE', '%'. $request->keyword . '%')
                    ->orWhere('city', 'LIKE', '%'. $request->keyword . '%')
                    ->orWhere('price', 'LIKE', '%'. $request->keyword . '%')
                    ->paginate(5);

        $categories     =  $this->category->get();


        return view('accommodation.search')->with('all_accommodations', $accommodations)
                                                 ->with('categories', $categories);
    }

    public function search_by_filters(Request $request)
    {
        $query = $this->accommodation->query();

        $query->when($request->capacity, function ($q, $capacity) {
            $capacityRanges = [
                'capa_1' => [1, 2],
                'capa_2' => [3, 5],
                'capa_3' => [6, 10],
            ];

            if (isset($capacityRanges[$capacity])) {
                $q->whereBetween('capacity', $capacityRanges[$capacity]);
            } elseif ($capacity === 'capa_4') {
                $q->where('capacity', '>', 10);
            }
        });

        $query->when($request->filled(['min_price', 'max_price']), function ($q) use ($request) {
            $q->whereBetween('price', [$request->min_price, $request->max_price]);
        });

        $query->when($request->filled('city'), function ($q) use ($request) {
            $q->where('city', 'LIKE', '%' . $request->city . '%');
        });

        $query->when($request->filled('category'), function ($q) use ($request) {
            $q->whereHas('categories', function($query) use ($request) {
                $query->where('categories.id', $request->category);
            });
        });


        $categories     =  $this->category->get();
        $accommodations = $query->get();

        return view('accommodation.search')->with('all_accommodations', $accommodations)
                                                 ->with('categories', $categories);

    }

    public function destroy($id)
    {
        $this->accommodation->destroy($id);

        return redirect()->route('host.index');
    }
}

