<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('musteri');
            $table->integer('referans');
            $table->string('eventBaslangicTarihi')->nullable();
            $table->string('eventBitisTarihi')->nullable();
            $table->string('projeTeslimSekli')->nullable();
            $table->string('ilgiliDepartman')->nullable();
            $table->string('kisiSayisi')->nullable();
            $table->timestamp('baslangicSaati')->nullable();
            $table->timestamp('bitisSaati')->nullable();
            $table->string('projeEvSahibiProfili')->nullable();
            $table->string('katlımcıProfiliHedefKitle')->nullable();
            $table->string('kadınErkekDağılımıYüzde')->nullable();
            $table->string('projeMekan')->nullable();
            $table->string('isTanimi')->nullable();
            $table->string('amac')->nullable();
            $table->string('konsept')->nullable();
            $table->string('icerikGunAkısDetay')->nullable();
            $table->string('markaAkreTipi')->nullable();
            $table->string('karakteri')->nullable();
            $table->string('detaylar')->nullable();
            $table->string('butceAraligi')->nullable();
            $table->string('butceDagilimi')->nullable();
            $table->string('oncekiDonemlerTaihAralıgı')->nullable();
            $table->string('ozelGeceler')->nullable();
            $table->string('sanatciGala')->nullable();
            $table->string('konusmaci')->nullable();
            $table->string('sunucuModerator')->nullable();
            $table->string('sovTeatral')->nullable();
            $table->string('acivite')->nullable();
            $table->string('serbestZamanİcerikleri')->nullable();
            $table->string('markaRenkKodlari')->nullable();
            $table->string('markaLogosuFontlariVector')->nullable();
            $table->string('markaKurumsakKimlikDokumani')->nullable();
            $table->string('tasarimsalNetBeklenti')->nullable();
            $table->string('2DTasarimKalemleri')->nullable();
            $table->string('3DTasarimKalemleri')->nullable();
            $table->string('DekorasyonSusleme')->nullable();
            $table->string('MultiMediaTasarımKalemleri')->nullable();
            $table->string('webSitesi')->nullable();
            $table->string('sosyalMedya')->nullable();
            $table->string('etkinlikFilmi')->nullable();
            $table->string('diger')->nullable();
            $table->timestamps();

            $table->foreign('musteri')->references('id')->on('musteri');
            $table->foreign('referans')->references('id')->on('referans');
            $table->foreign('ilgiliDepartman')->references('id')->on('departmanlar');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('briefs');
    }
}
