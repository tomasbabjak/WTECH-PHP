<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; ++$i) {
        Product::create([
            'name' => 'Stan '.$i,
            'brand' => 'Quechua',
            'label' => 'quechua-stan-'.$i,
            'detail' => 'Tento stan je stanom pod ktorym sa da stanovat a aj spat. Najlepsi stan na Slovensku.',
            'price' => rand(40,500)+0.99,
            'in_stock' => rand(0,20),
            'category_id' => 4
        ]);
        }

        for ($i = 0; $i < 5; ++$i) {
            Product::create([
                'name' => 'Teplaky '.$i,
                'brand' => 'Quechua',
                'label' => 'quechua-teplaky-'.$i,
                'detail' => 'As you can see in these examples, the first rand function generates a random number between 10 and 30',
                'price' => rand(10,50)+0.99,
                'in_stock' => rand(0,20),
                'category_id' => 2
            ]);
        }

        for ($i = 0; $i < 7; ++$i) {
            Product::create([
                'name' => 'Teplaky '.$i,
                'brand' => 'Poma',
                'label' => 'poma-teplaky-'.$i,
                'detail' => 'As you can see in these examples, the first rand function generates a random number between 10 and 30',
                'price' => rand(10,50)+0.99,
                'in_stock' => rand(0,20),
                'category_id' => 2
            ]);
        }

        for ($i = 0; $i < 10; ++$i) {
            Product::create([
                'name' => 'Kretasy '.$i,
                'brand' => 'Poma',
                'label' => 'poma-kretasy-'.$i,
                'detail' => 'As you can see in these examples, the first rand function generates a random number between 10 and 30',
                'price' => rand(10,50)+0.99,
                'in_stock' => rand(0,20),
                'category_id' => 2
            ]);
        }

        for ($i = 0; $i < 3; ++$i) {
            Product::create([
                'name' => 'Batoh '.$i,
                'brand' => 'Poma',
                'label' => 'poma-batoh-'.$i,
                'detail' => 'As you can see in these examples, the first rand function generates a random number between 10 and 30',
                'price' => rand(10,110)+0.99,
                'in_stock' => rand(0,20),
                'category_id' => 3
            ]);
        }

        for ($i = 0; $i < 5; ++$i) {
            Product::create([
                'name' => 'Batoh '.$i,
                'brand' => 'Abibas',
                'label' => 'abibas-batoh-'.$i,
                'detail' => 'As you can see in these examples, the first rand function generates a random number between 10 and 30',
                'price' => rand(10,110)+0.99,
                'in_stock' => rand(0,20),
                'category_id' => 3
            ]);
        }

        for ($i = 0; $i < 5; ++$i) {
            Product::create([
                'name' => 'Celovka '.$i,
                'brand' => 'Poma',
                'label' => 'poma-celovka-'.$i,
                'detail' => 'As you can see in these examples, the first rand function generates a random number between 10 and 30',
                'price' => rand(5, 20)+0.99,
                'in_stock' => rand(0,20),
                'category_id' => 5
            ]);
        }

        for ($i = 0; $i < 6; ++$i) {
            Product::create([
                'name' => 'Macky '.$i,
                'brand' => 'Quechua',
                'label' => 'Quechua-macky-'.$i,
                'detail' => 'As you can see in these examples, the first rand function generates a random number between 10 and 30',
                'price' => rand(10,100)+0.99,
                'in_stock' => rand(0,20),
                'category_id' => 5
            ]);
        }


        Product::create([
            'name' => 'Terrex A1',
            'brand' => 'Abibas',
            'label' => 'abibas-terrex-a1',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 44.99,
            'in_stock' => 10,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Horska H1',
            'brand' => 'Poma',
            'label' => 'poma-horska-h1',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 64.99,
            'in_stock' => 0,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Terrex WQ',
            'brand' => 'Abibas',
            'label' => 'abibas-terrex-wq',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 45.99,
            'in_stock' => 8,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Brown',
            'brand' => 'Poma',
            'label' => 'poma-horska-brown',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 24.99,
            'in_stock' => 10,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'New',
            'brand' => 'Abibas',
            'label' => 'abibas-new',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 74.99,
            'in_stock' => 6,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Black',
            'brand' => 'Poma',
            'label' => 'poma-black',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 54.99,
            'in_stock' => 10,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'J1',
            'brand' => 'Salaman',
            'label' => 'salaman-j1',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 14.99,
            'in_stock' => 10,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'E2',
            'brand' => 'Salaman',
            'label' => 'salaman-e2',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 4.99,
            'in_stock' => 5,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'W3',
            'brand' => 'Salaman',
            'label' => 'salaman-w3',
            'detail' => 'Vyberte si z najširšej ponuky turistickej obuvy na Slovensku.',
            'price' => 34.99,
            'in_stock' => 1,
            'category_id' => 1
        ]);
    }
}
