<?php

use Illuminate\Database\Seeder;

class ConferenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Conferencia::class, 50)->create();
        App\Conferencia::create([
            'name' => 'Ingles'
        ]);
        App\Conferencia::create([
            'name' => 'Programacion Neuro Linguistica'
        ]);
    }
}
