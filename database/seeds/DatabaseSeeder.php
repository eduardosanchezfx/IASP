<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class); //manda a llamar al seeder UsersTableSeeder
        // $this->call(UsersTableSeeder::class);
    }
}
