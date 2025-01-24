<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Hashtag;
use App\Models\Photo;
use Illuminate\Support\Facades\Http;

class AccommodationController extends Controller
{
    private $accommodation;

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'price',
        'city',
        'latitude',
        'longitude',
        'capacity',
        'hashtag_name',
        'category_id',
        'description',
    ];

    public function __construct(Accommodation $accommodation)
    {
        $this->accommodation = $accommodation;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'address' => 'required|string',
            'price' => 'required|integer|min:0',
            'city' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        // リクエストから宿泊施設名と住所を取得
        $address     = $validated['address'];
        $apiKey = config('services.google_api');

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

                $accommodation = Accommodation::create($validated);

                if ($request->hasFile('photos')) {
                    foreach ($request->file('photos') as $photo) {
                        $path = $photo->store('photos', 'public');
                        Photo::create([
                            'accommodation_id' => $accommodation->id,
                            'photo_path' => $path,
                        ]);
                    }
                }


                // if(!empty($validated['description'])) {
                //     preg_match_all('/#(\w+)/', $validated['description'], $matches);
                //     $tags = $matches[1];

                //     $tagIds = [];
                //     foreach($tags as $tagName) {
                //         $tag = Hashtag::firstOrCreate(['name' => $tagName]);
                //         $tagIds[] = $tag->id;
                //     }

                //     $accommodation->tags()->attach($tagIds);
                // }

                return redirect()->route('accommodation.show', $accommodation->id)
                    ->with('success', 'Registered The Accommodation');
            } else {
                return response()->json(['error' => 'Failed to giocording', 'details' => $data], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occured', 'message' => $e->getMessage()], 500);
        }
    }
}
