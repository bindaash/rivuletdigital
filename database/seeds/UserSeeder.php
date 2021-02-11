<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'email_verified_at' =>  '2021-02-10 18:04:42',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'test1',
            'email' => 'test1@test.com',
            'email_verified_at' =>  '2021-02-10 18:04:42',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'test3',
            'email' => 'test3@test.com',
            'email_verified_at' =>  '2021-02-10 18:04:42',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'test4',
            'email' => 'test4@test.com',
            'email_verified_at' =>  '2021-02-10 18:04:42',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'test5',
            'email' => 'test5@test.com',
            'email_verified_at' =>  '2021-02-10 18:04:42',
            'password' => bcrypt('123456'),
        ]);
        
    }
}
