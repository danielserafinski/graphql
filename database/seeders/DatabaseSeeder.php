<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Eloquent;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            UserTableSeeder::class,
//            PostTableSeeder::class
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
