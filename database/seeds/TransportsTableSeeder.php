<?php

use Illuminate\Database\Seeder;
use App\Transport;

class TransportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transport::create([
            'name' => 'Osobný odber na predajni',
            'price' => 0,
        ]);
        Transport::create([
            'name' => 'Kurierska spolocnost',
            'price' => 2.59,
        ]);
        Transport::create([
            'name' => 'Slovenská pošta',
            'price' => 1.59,
        ]);
    }
}
