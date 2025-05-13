<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $data = [
            [
                'id' => '1',
                'category_name' => 'pengetahuan umum',
                'type' => 'benefit',
                'weight' => '0.25'
            ],
            [
                'id' => '2',
                'category_name' => 'wawancara',
                'type' => 'benefit',
                'weight' => '0.20'
            ],
            [
                'id' => '3',
                'category_name' => 'PBB',
                'type' => 'benefit',
                'weight' => '0.20'
            ],
            [
                'id' => '4',
                'category_name' => 'jasmani',
                'type' => 'benefit',
                'weight' => '0.20'
            ],
            [
                'id' => '5',
                'category_name' => 'absensi kehadiran',
                'type' => 'cost',
                'weight' => '0.15'
            ],
        ];
        
        foreach ($data as $category) {
            DB::table('categories')->insert([
                'id' => $category['id'],
                'category_name' => $category['category_name'],
                'type' => $category['type'],
                'weight' => $category['weight'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
