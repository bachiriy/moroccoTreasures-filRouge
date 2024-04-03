<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = [
            [
                'name' => 'Zellige (Tilework)',
                'description' => 'Zellige is a traditional Moroccan mosaic tilework, known for its intricate geometric patterns. These tiles are typically hand-cut and assembled into stunning designs used to decorate walls, floors, fountains, and other architectural features.'
            ],
            [
                'name' => 'Textiles',
                'description' => 'Moroccan textiles are diverse and vibrant, featuring intricate embroidery, weaving, and dyeing techniques. Examples include the wool rugs of the Atlas Mountains, the embroidered textiles of Fes, and the colorful silk garments of Marrakech.'
            ],
            [
                'name' => 'Leather Goods',
                'description' => 'Morocco is renowned for its high-quality leather products, including bags, shoes, belts, and jackets. Leather goods are often handcrafted using traditional techniques and adorned with decorative elements such as embossing and metal hardware.'
            ],
            [
                'name' => 'Metalwork',
                'description' => 'Moroccan metalwork encompasses a wide range of items, from ornate lanterns and lamps to intricately patterned trays and tea sets. Artisans use techniques such as hammering, engraving, and filigree to create stunning pieces from brass, copper, and silver.'
            ]
        ];
        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}
