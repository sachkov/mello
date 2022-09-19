<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminId = DB::table('users')->where('email','admin@google.com')->value('id');
        $blogerId = DB::table('users')->where('email','bloger@google.com')->value('id');
        $watcherId = DB::table('users')->where('email','watcher@google.com')->value('id');

        if(!$adminId){
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@google.com',
                'password' => bcrypt('123456'),
            ]);
        }

        if(!$blogerId){
            DB::table('users')->insert([
                'name' => 'Mike',
                'email' => 'bloger@google.com',
                'password' => bcrypt('123456'),
            ]);
        }

        if(!$watcherId){
            DB::table('users')->insert([
                'name' => 'Kim',
                'email' => 'watcher@google.com',
                'password' => bcrypt('123456'),
            ]);
        }
    }
}
