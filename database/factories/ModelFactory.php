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

$factory->define(App\Http\Models\ClientMember\ClientMember::class, function (Faker\Generator $faker) {
    return [
        'nameChinese'=>$faker->name,
        'nameEnglish'=>$faker->lastName,
        'sex'=>$faker->boolean(),
        'telOne'=>$faker->phoneNumber,
        'telTwo'=>$faker->phoneNumber,
        'qq'=>$faker->numberBetween(123456),
        'wechat'=>$faker->firstName,
        'email'=>$faker->email,
        'birthday'=>$faker->unixTime,
        'description'=>$faker->jobTitle,
        'age'=>$faker->numberBetween(18,50),
        'phone'=>$faker->numberBetween(7410392,9837627),
        'phoneExt'=>$faker->numberBetween(10,99),
        'account'=>$faker->bankAccountNumber,
        'bargainNum'=>$faker->numberBetween(0,99),
        'note'=>$faker->word,
        'close'=>$faker->boolean(),
    ];
});
