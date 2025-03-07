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
        // 1〜20 の数字の配列を作成し、4枚ずつに分割
        $images = range(1, 24);
        $chunks = array_chunk($images, 4); // 各 chunk は 4 枚の画像番号が入る

        // 各 accommodation に対して、1つの chunk を割り当てる
        foreach ($accommodations as $index => $accommodation) {
            // accommodation の数より画像の chunk が少なければスキップ
            if (!isset($chunks[$index])) {
                continue;
            }
            foreach ($chunks[$index] as $i) {
                $sourcePath = database_path("seeders/photos/photo{$i}.jpeg");
                $filename = $accommodation->id . "_photo{$i}.jpeg";
                $destinationPath = "https://roomify-portfolio.s3.ap-northeast-1.amazonaws.com/photos/" . $filename;

                if (File::exists($sourcePath)) {
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
