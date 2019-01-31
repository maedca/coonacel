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
        factory(\App\Relacionista::class, 20)->create();
    }
}
