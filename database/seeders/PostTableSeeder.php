<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
