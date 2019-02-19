<?php

use App\Conferencista;
use Illuminate\Database\Seeder;

class ConferencistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Conferencista::class, 50)->create();
        \App\Conferencista::create([
            'name' => 'Carlos Rosales',
            'ci' => '17369964',
            'phone' => '04248402081',
            'email' => 'conferencista@dev.com'
//         'password' => \Illuminate\Support\Facades\Hash::make('123')
        ]);
        \App\Conferencista::create([
            'name' => 'Carlos Camacho',
            'ci' => '173699645',
            'phone' => '04248402081',
            'email' => 'conferencista@gmail.com'
//         'password' => \Illuminate\Support\Facades\Hash::make('123')
        ]);
    }
}
