<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(\App\User::class)->create();

        factory(\App\Client::class, 10)->create([
           'user_id' => $user->id
        ]);
    }
}
