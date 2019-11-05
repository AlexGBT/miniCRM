<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'website' => $faker->url,
        'logo' => $faker->image('public/storage/companies',300,300,null,false),
        'user_id' => rand(1,2),
    ];
});
