<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Bilim", "Teknoloji", "Spor", "Tarih", "Çevre", "Eğitim", "Uzay", "Kitap Önerileri"];
        foreach ($categories as $category){
            Categories::create([
                "name" => $category,
                "name_seo" => Str::slug($category)
            ]);

        }



    }
}
