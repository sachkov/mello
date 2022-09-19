<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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

        $roleAdminId = DB::table('roles')->where('code','admin')->value('id');
        $roleBlogerId = DB::table('roles')->where('code','bloger')->value('id');
        $roleWatcherId = DB::table('roles')->where('code','watcher')->value('id');

        if(!$roleAdminId){
            DB::table('roles')->insert([
                'name' => 'admin',
                'code' => 'admin',
            ]);

            $roleAdminId = DB::table('roles')->where('code','admin')->value('id');

            DB::table('user_roles')->insert([
                'user_id' => $adminId,
                'role_id' => $roleAdminId,
            ]);
        }

        if(!$roleBlogerId){
            DB::table('roles')->insert([
                'name' => 'bloger',
                'code' => 'bloger',
            ]);

            $roleBlogerId = DB::table('roles')->where('code','bloger')->value('id');

            DB::table('user_roles')->insert([
                'user_id' => $blogerId,
                'role_id' => $roleBlogerId,
            ]);
        }

        if(!$roleWatcherId){
            DB::table('roles')->insert([
                'name' => 'watcher',
                'code' => 'watcher',
            ]);

            $roleWatcherId = DB::table('roles')->where('code','watcher')->value('id');

            DB::table('user_roles')->insert([
                'user_id' => $watcherId,
                'role_id' => $roleWatcherId,
            ]);
        }
    }
}
