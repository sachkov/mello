<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogerId = DB::table('users')->where('email','bloger@google.com')->value('id');

        $first = DB::table('posts')->where('title','first')->value('id');
        $second = DB::table('posts')->where('title','second')->value('id');
        $third = DB::table('posts')->where('title','third')->value('id');

        if($blogerId){

            if(!$first){
                DB::table('posts')->insert([
                    'title' => 'first',
                    'content' => Str::random(100),
                    'user_id' => $blogerId,
                ]);
            }

            if(!$second){
                DB::table('posts')->insert([
                    'title' => 'second',
                    'content' => Str::random(100),
                    'user_id' => $blogerId,
                ]);
            }

            if(!$third){
                DB::table('posts')->insert([
                    'title' => 'third',
                    'content' => Str::random(100),
                    'user_id' => $blogerId,
                ]);
            }
        }
    }
}
