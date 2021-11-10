<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description',100)->unique();
        });
        DB::table('roles')->insert(array('id'=>1,'description'=>'Administrador'));
        DB::table('roles')->insert(array('id'=>2,'description'=>'Secretaria'));
        DB::table('roles')->insert(array('id'=>3,'description'=>'Repartidor'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
