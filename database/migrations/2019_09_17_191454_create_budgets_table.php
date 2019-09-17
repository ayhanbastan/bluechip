<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('musteriId');
            $table->integer('referansId');
            $table->string('butceBaslik');
            $table->string('hizmet');
            $table->integer('kezGun');
            $table->integer('kisiAdet');
            $table->integer('birimUcret');
            $table->integer('toplam');
            $table->timestamps();

            $table->foreign('musteriId')->references('id')->on('musteri');
            $table->foreign('referansId')->references('id')->on('referans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
}
