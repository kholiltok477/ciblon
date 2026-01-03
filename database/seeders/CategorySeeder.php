<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name'=>'10-12 Tahun - Gaya Bebas','description'=>'Kategori usia 10-12 tahun'],
            ['name'=>'13-15 Tahun - Gaya Dada','description'=>'Kategori usia 13-15 tahun'],
            ['name'=>'16-18 Tahun - Gaya Punggung','description'=>'Kategori usia 16-18 tahun'],
        ];

        foreach($categories as $c) Category::create($c);
    }
}
