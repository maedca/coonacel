<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Book::create([
            'name' => 'Curso de Comunidad Digital (sistemas )'
        ]);
        App\Book::create([
            'name' => 'Curso de Programación Neurolingüística'
        ]);
        App\Book::create([
            'name' => 'Curso de Ingles'
        ]);
        App\Book::create([
            'name' => 'Curso de Excel al dia'
        ]);
        App\Book::create([
            'name' => '50 técnicas para solucionar Conflictos'
        ]);
        App\Book::create([
            'name' => 'Docentes Siglo XXI'
        ]);
        App\Book::create([
            'name' => 'Niños Genios'
        ]);
        App\Book::create([
            'name' => 'Coaching'
        ]);
    }
}
