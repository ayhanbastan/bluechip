<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $table    = 'briefs';
    protected $fillable = [
        'musteri',
        'referans',
        'eventBaslangicTarihi',
        'eventBitisTarihi',
        'projeTeslimSekli',
        'ilgiliDepartman',
        'kisiSayisi',
        'baslangicSaati',
        'bitisSaati',
        'projeEvSahibiProfili',
        'katlımcıProfiliHedefKitle',
        'kadınErkekDağılımıYüzde',
        'projeMekan',
        'isTanimi',
        'amac',
        'konsept',
        'icerikGunAkısDetay',
        'markaAkreTipi',
        'karakteri',
        'detaylar',
        'butceAraligi',
        'butceDagilimi',
        'oncekiDonemlerTaihAralıgı',
        'ozelGeceler',
        'sanatciGala',
        'konusmaci',
        'sunucuModerator',
        'sovTeatral',
        'acivite',
        'serbestZamanİcerikleri',
        'markaRenkKodlari',
        'markaLogosuFontlariVector',
        'markaKurumsakKimlikDokumani',
        'tasarimsalNetBeklenti',
        'twoDTasarimKalemleri',
        'threeDTasarimKalemleri',
        'DekorasyonSusleme',
        'MultiMediaTasarımKalemleri',
        'webSitesi',
        'sosyalMedya',
        'etkinlikFilmi',
        'diger',
        'created_at',
        'updated_at',
    ];

    public function customers()
    {
        return $this->belongsTo(CustomerDefination::class, 'musteri', 'id');
    }

    public function referance()
    {
        return $this->belongsTo(Referans::class, 'referans', 'id');
    }

    public function departmans(){
        return $this->belongsTo(Departman::class,'ilgiliDepartman','departmanId');
    }
}
