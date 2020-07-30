<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Core\Entities\Label;

$factory->define(Label::class, function (Faker $faker) {
    return [
        'key'    => $faker->word,
        'module' => 'core',
        'vi'     => [
            'value' => $faker->sentence
        ],
        'en'     => [
            'value' => $faker->sentence
        ]
    ];
});
