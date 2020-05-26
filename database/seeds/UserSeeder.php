<?php

use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'nom' => 'Admin',
            'prenoms' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@2020')
        ]);
    }
}
