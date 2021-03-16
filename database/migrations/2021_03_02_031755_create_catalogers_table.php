<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogers', function (Blueprint $table) {
            $table->increments('id_cataloger');
            $table->string('name');
            $table->string('month');
            $table->string('client');
            $table->date('date');
            $table->char('workingdays', 1);
            $table->char('mandays', 1);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('catalogers');
    }
}
