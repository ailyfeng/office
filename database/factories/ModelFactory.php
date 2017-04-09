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
        'nameEnglish'=>$faker->word,
        'sex'=>$faker->boolean(),
        'telOne'=>$faker->phoneNumber,
        'telTwo'=>$faker->phoneNumber,
        'qq'=>$faker->numberBetween(54321,123456789),
        'wechat'=>$faker->word,
        'email'=>$faker->email,
        'birthday'=>$faker->unixTime,
        'description'=>$faker->catchPhrase,
        'age'=>$faker->numberBetween(18,50),
        'phone'=>$faker->numberBetween(7410392,9837627),
        'phoneExt'=>$faker->numberBetween(10,99),
        'account'=>$faker->creditCardNumber,//行用卡号
        'bargainNum'=>$faker->numberBetween(0,99),
        'note'=>$faker->companyPrefix,
        'close'=>$faker->boolean(),
    ];
});
