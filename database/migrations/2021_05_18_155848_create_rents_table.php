<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');


            $table->unsignedBigInteger('Sportsground_idSportsground')->nullable();
            $table->foreign('Sportsground_idSportsground')
                ->references('id')
                ->on('sportsgrounds')
                ->onDelete('set null');

            $table->unsignedBigInteger('Customer_idCustomer')->nullable();
            $table->foreign('Customer_idCustomer')
                ->references('id')
                ->on('customers')
                ->onDelete('set null');

            $table->float('price');
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
        Schema::dropIfExists('rents');
    }
}
