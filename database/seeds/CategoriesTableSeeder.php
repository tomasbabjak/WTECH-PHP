<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Turisticka obuv',
            'label' => 'obuv',
            'description' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.'
        ]);
        Category::create([
            'name' => 'Oblečenie na turistiku',
            'label' => 'oblecenie',
            'description' => 'Vyberte si z najširšej ponuky turistickeho oblecenia na Slovensku.'
        ]);
        Category::create([
            'name' => 'Turistické batohy',
            'label' => 'batohy',
            'description' => 'Vyberte si z najširšej ponuky turistickych batohov na Slovensku.'
        ]);
        Category::create([
            'name' => 'Stany a bivakovanie',
            'label' => 'stany',
            'description' => 'Vyberte si z najširšej ponuky stanov na Slovensku.'
        ]);
        Category::create([
            'name' => 'Príslušenstvo na turistiku',
            'label' => 'prislusenstvo',
            'description' => 'Vyberte si z najširšej ponuky turistickeho prislusenstva na Slovensku.'
        ]);

    }
}
