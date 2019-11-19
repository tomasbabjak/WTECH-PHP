<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'name' => 'V hotovosti/kartou pri vyzdvihnuti',
        ]);
        Payment::create([
            'name' => 'Kartou online',
        ]);
        Payment::create([
            'name' => 'TatraPay',
        ]);
        Payment::create([
            'name' => 'SporoPay',
        ]);
        Payment::create([
            'name' => 'PayPal',
        ]);

    }
}
