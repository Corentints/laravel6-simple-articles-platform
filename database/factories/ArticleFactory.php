<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $this->faker->sentence;
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'summary' => $this->faker->realText(200),
        'content' => $this->faker->text,
        'author_id' => factory(\App\User::class)->create(['is_admin' => 1])
    ];
});
