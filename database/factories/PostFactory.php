<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'link' => $slug = $faker->unique()->slug,
        'title' => $slug,
        'text' => $faker->text,
        'hide' => '0',
        'updated_at' => now(),
        'created_at' => now()
    ];
});
