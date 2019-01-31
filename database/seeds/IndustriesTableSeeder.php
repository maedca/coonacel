<?php

use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Industry::create([
            'name' => 'textil',
        ]);
        \App\Industry::create([
            'name' => 'metal',
        ]);
        \App\Industry::create([
            'name' => 'educacion',
        ]);
        \App\Industry::create([
            'name' => 'automotriz',
        ]);
        \App\Industry::create([
            'name' => 'alimentos',
        ]);
    }
}
