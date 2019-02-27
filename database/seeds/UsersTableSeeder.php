<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'master',
            'ci'=>'17369964',
            'phone'=>'04248402081',
            'email' => 'admin@dev.com',
            'role' => 'master',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
        ]);
        \App\User::create([
        'name' => 'Conferencista',
            'ci'=>'17369964',
            'phone'=>'04248402081',
        'email' => 'conferencista@dev.com',
            'role' => 'conferencista',
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
    ]); \App\User::create([
        'name' => 'Relacionista',
        'ci'=>'17369964',
        'phone'=>'04248402081',
        'email' => 'relacionista@dev.com',
        'role' => 'relacionista',
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
    ]);
        \App\User::create([
            'name' => 'Director',
            'ci'=>'17369964',
            'phone'=>'04248402081',
            'email' => 'director@dev.com',
            'role' => 'director',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
        ]);
        \App\User::create([
            'name' => 'Logistica',
            'ci'=>'17369964',
            'phone'=>'04248402081',
            'email' => 'logistica@dev.com',
            'role' => 'logistica',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
        ]);
        \App\User::create([
            'name' => 'T.Humano',
            'ci'=>'17369964',
            'phone'=>'04248402081',
            'email' => 'talento@dev.com',
            'role' => 'thumano',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
        ]);
    }
}
