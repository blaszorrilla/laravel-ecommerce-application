<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('status', ['pendiente', 'procesando', 'completo', 'rechazado'])->default('pendiente');
            $table->decimal('grand_total', 20, 6);
            $table->unsignedInteger('item_count');

            $table->boolean('payment_status')->default(1);
            $table->string('payment_method')->nullable();

            $table->string('nombre');
            $table->string('apellido');
            $table->string('ciudad');
            $table->text('direccion');
            $table->string('telefono');
            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
