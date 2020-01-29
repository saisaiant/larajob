<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use App\User;
use App\Company;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'title' => $title = $faker->text,
        'slug' => Str::slug($title),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'category_id' => rand(1,5),
        'type' => 'full-time',
        'status' => rand(0,1),
        'roles' => $faker->text,
        'description' => $faker->paragraph(rand(2,10)),
        'last_date' => $faker->DateTime
    ];
});
