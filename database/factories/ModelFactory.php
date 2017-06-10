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
use handy\ProfileImage;
use handy\Review;
use handy\User;

$factory->define(handy\Address::class, function (Faker\Generator $faker) {
    return [
      'street' => $faker->streetName,
      'civic_number' => $faker->randomDigitNotNull,
      'city' => $faker->city,
      'country' => $faker->country,
      'latitude' => $faker->latitude($min = -90, $max = 90) ,
      'longitude' => $faker->longitude($min = -180, $max = 180),
    ];
});

$factory->define(handy\Category::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->firstNameMale,
      'icon' => $faker->url,
    ];
});

$factory->define(handy\Image::class, function (Faker\Generator $faker) {
    $id_item_random = Item::all()->pluck('id')->toArray();

    return [
      'name' => "objects.png",
      'id_item' => $faker->randomElement($id_item_random),
    ];
});

$factory->define(handy\Item::class, function (Faker\Generator $faker) {
    $id_user_random = User::all()->pluck('id')->toArray();
    $id_category_random = Category::all()->pluck('id')->toArray();

    return [
        'name' => $faker->firstNameMale,
        'description' => $faker->text($maxNbChars = 200),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99),
        'start_date' => $faker->date,
        'end_date' => $faker->date,
        'status' => $faker->boolean,
        'id_user' => $faker->randomElement($id_user_random),
        'id_category' => $faker->randomElement($id_category_random)
    ];
});

$factory->define(handy\Loan::class, function (Faker\Generator $faker) {
    $id_user_random = User::all()->pluck('id')->toArray();
    $id_item_random = Item::all()->pluck('id')->toArray();

    return [
        'start_date' => $faker->date,
        'end_date' => $faker->date,
        'loan_confirmation' => $faker->boolean,
        'return_confirmation' => $faker->boolean,
        'id_owner' => $faker->randomElement($id_user_random),
        'id_receiver' => $faker->randomElement($id_user_random),
        'id_item' => $faker->randomElement($id_item_random),
    ];
});

$factory->define(handy\ProfileImage::class, function (Faker\Generator $faker) {
    return [
      'name' => "defaultImage.png",
    ];
});

$factory->define(handy\Review::class, function (Faker\Generator $faker) {
    $id_user_random = User::all()->pluck('id')->toArray();
    $id_item_random = Item::all()->pluck('id')->toArray();

    return [
        'description' => $faker->text($maxNbChars = 200),
        'value' => $faker->numberBetween($min = 5, $max = 0),
        'date' => $faker->date,
        'id_item' => $faker->randomElement($id_item_random),
        'id_owner' => $faker->randomElement($id_user_random),
        'id_reviewer' => $faker->randomElement($id_user_random),
    ];
});

$factory->define(handy\User::class, function (Faker\Generator $faker) {
    static $password;
    $id_address_random = Address::all()->pluck('id')->toArray();
    $id_profile_image_random = ProfileImage::all()->pluck('id')->toArray();

    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'birth_date' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'id_address' => $faker->randomElement($id_address_random),
        'id_profile_image' => $faker->randomElement($id_profile_image_random),
    ];
});
