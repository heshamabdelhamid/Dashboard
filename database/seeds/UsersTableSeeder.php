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
            'name' => 'super_admin',
            'email' => 'super_admin@app.com',
            'user_type' => 'super_admin',
            'password' => bcrypt('12345678'),
        ]);
    }
}
