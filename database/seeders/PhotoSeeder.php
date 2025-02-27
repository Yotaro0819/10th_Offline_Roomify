<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accommodations = Accommodation::all();

        foreach($accommodations as $accommodation) {
            for($i = 1; $i <= 4; $i++ ) {
                $sourcePath = database_path("seeders/photos/photo{$i}.jpeg");
                $filename = $accommodation->id . "photo". $i. ".jpeg";
                $destinationPath = "photos/". $filename;

                if(File::exists($sourcePath)) {
                    $contents = File::get($sourcePath);
                    Storage::disk('public')->put($destinationPath, $contents);
                }

                DB::table('photos')->insert([
                    'accommodation_id' => $accommodation->id,
                    'image' => $destinationPath,

                ]);
            }
        }

    }
}
