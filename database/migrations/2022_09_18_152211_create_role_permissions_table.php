<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('role_permissions')) {
            Schema::create('role_permissions', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->unsignedBigInteger('role_id');
                $table->unsignedBigInteger('permission_id');

                $table->foreign('role_id')->references('id')->on('roles');
                $table->foreign('permission_id')->references('id')->on('permissions');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('role_permissions')) {
            Schema::dropIfExists('role_permissions');
        }
    }
}
