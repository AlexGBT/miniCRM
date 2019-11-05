<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Worker;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Worker::class, function (Faker $faker) {
    return [
//        'company_id' => function() {
//            return factory(App\Model\Company::class)->create()->id;
//        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
    ];
});