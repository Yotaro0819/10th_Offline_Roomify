<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Hashtag;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AccommodationController extends Controller
{
    private $accommodation;



    public function __construct(Accommodation $accommodation)
    {
        $this->accommodation = $accommodation;
    }


    public function create()
    {
        return view('accommodation.create');
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

                // if(!empty($validated['description'])) {
                //     preg_match_all('/#(\w+)/', $validated['description'], $matches);
                //     $tags = $matches[1];

                //     $tagIds = [];
                //     foreach($tags as $tagName) {
                //         $tag = Tag::firstOrCreate(['name' => $tagName]);
                //         $tagIds[] = $tag->id;
                //     }

                //     $accommodation->tags()->attach($tagIds);
                // }

                if ($request->hasFile('photos')) {
                    foreach ($request->file('photos') as $photo) {
                        // 各写真を保存
                        $path = $photo->store('photos', 'public'); // publicディスクに保存

                        // Photoモデルで保存
                        Photo::create([
                            'accommodation_id' => $accommodation->id, // Accommodationとの関連
                            'image' => $path, // 保存先パス
                        ]);
                    }
                }

                return redirect()->route('accommodation.show', $accommodation->id)
                    ->with('success', '宿泊施設が登録されました');
            } else {
                return response()->json(['error' => '住所のジオコーディングに失敗しました。', 'details' => $data], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'エラーが発生しました。', 'message' => $e->getMessage()], 500);
        }
    }


    public function show($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        return view('accommodation.show', compact('accommodation'));
    }
}
