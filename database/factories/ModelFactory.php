<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Database\Eloquent\Factory;
use handy\Address;
use handy\Category;
use handy\Image;
use handy\Item;
use handy\Loan;
use handy\Review;
use handy\User;

$factory->define(handy\User::class, function (Faker\Generator $faker) {
    static $password;
    $id_address_random = Address::all()->pluck('id')->toArray();
    $id_image_random = Image::all()->pluck('id')->toArray();

    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'birthday' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'password' => $faker->word, //$password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'id_address' => $faker->randomElement($id_address_random),
        'id_profile_image' => $faker->randomElement($id_image_random),
    ];
});
