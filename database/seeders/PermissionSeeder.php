<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleBlogerId = DB::table('roles')->where('code','bloger')->value('id');
        $roleWatcherId = DB::table('roles')->where('code','watcher')->value('id');

        $posts = DB::table('permissions')->where('code','posts.index')->value('id');
        $postShow = DB::table('permissions')->where('code','posts.show')->value('id');
        $myPosts = DB::table('permissions')->where('code','my_posts')->value('id');
        $permis = DB::table('permissions')->where('code','permissions.index')->value('id');

        if(!$posts){
            DB::table('permissions')->insert([
                'name' => 'show all posts',
                'code' => 'posts.index',
            ]);

            $posts = DB::table('permissions')->where('code','posts.index')->value('id');

            DB::table('role_permissions')->insert([
                'permission_id' => $posts,
                'role_id' => $roleWatcherId,
            ]);
            DB::table('role_permissions')->insert([
                'permission_id' => $posts,
                'role_id' => $roleBlogerId,
            ]);
        }

        if(!$postShow){
            DB::table('permissions')->insert([
                'name' => 'show current post',
                'code' => 'posts.show',
            ]);

            $postShow = DB::table('permissions')->where('code','posts.show')->value('id');

            DB::table('role_permissions')->insert([
                'permission_id' => $postShow,
                'role_id' => $roleBlogerId,
            ]);
        }

        if(!$myPosts){
            DB::table('permissions')->insert([
                'name' => 'show my post',
                'code' => 'my_posts',
            ]);

            $myPosts = DB::table('permissions')->where('code','my_posts')->value('id');

            DB::table('role_permissions')->insert([
                'permission_id' => $myPosts,
                'role_id' => $roleBlogerId,
            ]);
        }

        if(!$permis){
            DB::table('permissions')->insert([
                'name' => 'show all permissions',
                'code' => 'permissions.index',
            ]);

            $permis = DB::table('permissions')->where('code','permissions.index')->value('id');

            DB::table('role_permissions')->insert([
                'permission_id' => $permis,
                'role_id' => $roleWatcherId,
            ]);
            DB::table('role_permissions')->insert([
                'permission_id' => $permis,
                'role_id' => $roleBlogerId,
            ]);
        }
    }
}
