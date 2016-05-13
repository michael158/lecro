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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->paragraph,
        'user_id' => 1,
        'finish_date' => $faker->dateTimeBetween('now', '+1 years')
    ];
});

$factory->define(App\Models\PostIt::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->paragraph,
        'description' => $faker->text,
        'status' => rand(1,3),
        'priority' => rand(1,4),
        'project_id' => rand (1,15)
    ];
});


