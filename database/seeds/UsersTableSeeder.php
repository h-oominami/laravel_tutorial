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
        /* 11/15ダミー記事生成 */
        $faker = Faker\Factory::create();

        for($i=0; $i<10; $i++){
        DB::table('posts')->insert([
            'title' => $faker->word,
            'content' => $faker->text,
            'created_at' => '2017-11-15 11:04:32',
            'updated_at' => '2017-11-15 11:04:32',
        ]);
        }
        /**/
    }
}
