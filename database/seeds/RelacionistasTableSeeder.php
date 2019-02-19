<?php

use Illuminate\Database\Seeder;

class RelacionistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Relacionista::class, 20)->create();
        \App\Relacionista::create([
            'name'=> 'Juana De Arco',
            'ci' => '173655954',
            'phone' => '04248526936',
            'email' => 'juanadearco@gmail.com'
        ]);
        \App\Relacionista::create([
            'name'=> 'Corazon Valiente',
            'ci' => '17365595445',
            'phone' => '0424852693645',
            'email' => 'martinvaliente@gmail.com'
        ]);
    }
}
