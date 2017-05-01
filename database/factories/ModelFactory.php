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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'api_token' => str_random(80),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
    	'name' => $faker->sentence(4),
    	'author' => $faker->name,
    	'pages' => $faker->randomNumber(3),
    	'started_in' => $faker->date(),
    	'description' => $faker->text(),
    	'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
    	'state' => $faker->randomElement(['in_process', 'paused', 'finish'])
    ];
});
