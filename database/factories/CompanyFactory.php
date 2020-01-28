<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Company;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'cname' => $name = $faker->company,
        'slug' => Str::slug($name),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'logo' => 'avatar/logo.png',
        'cover_photo' => 'cover/cover.jpg',
        'slogan' => 'learn-earn and grow',
        'description' => $faker->paragraph(rand(2,10)),
    ];
});
