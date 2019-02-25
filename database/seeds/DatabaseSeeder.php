<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        $this->call(ConferencistasTableSeeder::class);
        $this->call(ConferenciasTableSeeder::class);
        $this->call(RelacionistasTableSeeder::class);
//        $this->call(EmpresasTableSeeder::class);
        $this->call(IndustriesTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(BooksTableSeeder::class);
    }
}
