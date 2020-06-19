<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nom' => 'KORANDJI',
        'prenoms' => 'Wilfried',
        'email' => 'wilfried.korandji@gmail.com',
        'is_active' => 1,
        'email_verified_at' => now(),
        'password' => \Illuminate\Support\Facades\Hash::make('admin.2020'),
        'remember_token' => Str::random(10),
    ];
});
