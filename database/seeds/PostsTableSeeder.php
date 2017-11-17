<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vois->call(PostsTableSeeder::class);id
     */
    public function run()
    {
    /*テスト*/
	DB::table('posts')->truncate();
    factory(App\Post::class, 30)->create();
   	/**/
    }
}
