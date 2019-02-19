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
            'email' => 'admin@dev.com',
            'role' => 'master',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
        ]);
        \App\User::create([
        'name' => 'Conferencista',
        'email' => 'conferencista@dev.com',
            'role' => 'conferencista',
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
    ]); \App\User::create([
        'name' => 'Relacionista',
        'email' => 'relacionista@dev.com',
        'role' => 'relacionista',
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
    ]);
        \App\User::create([
            'name' => 'Director',
            'email' => 'director@dev.com',
            'role' => 'director',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
        ]);
    }
}
