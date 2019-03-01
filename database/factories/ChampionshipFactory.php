<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Championship::class, function (Faker $faker) {
    $author = factory(\App\Models\User::class)->create();

    return [
        'title' => $faker->sentence,
        'type' => 'championship',
        'content' => $faker->paragraph(6),
        'is_comment' => $faker->randomElement([true, false]),
        'author_id' => $author->id,
    ];
});
