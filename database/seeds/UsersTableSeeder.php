<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* test ++ */
        DB::table('posts')->insert([
          //  'id' => 1,
            'title' => 'test',
            'content' => 'test_content',
        ]);
        
        //factory(App\User::class, 3)->create();
        factory(App\Post::class, 3)->create();
        /**/
    }
}
