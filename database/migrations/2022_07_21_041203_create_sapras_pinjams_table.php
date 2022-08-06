<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaprasPinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sapras_pinjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->nullbable();
            $table->foreignId('sapras_id')->nullbable();
            $table->integer('qty')->nullbable();
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
        Schema::dropIfExists('sapras_pinjams');
    }
}
