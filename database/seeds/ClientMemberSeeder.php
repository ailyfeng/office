<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Http\Models\ClientMember\ClientMember::truncate();

        factory(App\Http\Models\ClientMember\ClientMember::class,10)->create();

    }
}
