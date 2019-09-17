<?php
declare( strict_types = 1 );

namespace App\Core\Services;

use App\Models\Brief;

class BriefService
{

    private $brief;

    public function __construct(Brief $brief)
    {
        $this->brief = $brief;
    }

    public function create(array $data)
    {
        $createData = [
            "musteri"                     => $data[ "musteriId" ],
            "referans"                    => $data[ "referansId" ],
            "eventBaslangicTarihi"        => $data[ "eventBaslangicTarihi" ],
            "eventBitisTarihi"            => $data[ "eventBitisTarihi" ],
            "projeTeslimSekli"            => $data[ "projeTeslimSekli" ],
            "ilgiliDepartman"             => $data[ "ilgiliDepartman" ],
            "kisiSayisi"                  => $data[ "kisiSayisi" ],
            "baslangicSaati"              => $data[ "baslangicSaati" ],
            "bitisSaati"                  => $data[ "bitisSaati" ],
            "projeEvSahibiProfili"        => $data[ "projeEvSahibiProfili" ],
            "katlımcıProfiliHedefKitle"   => $data[ "katlımcıProfiliHedefKitle" ],
            "kadınErkekDağılımıYüzde"     => $data[ "kadınErkekDağılımıYüzde" ],
            "projeMekan"                  => $data[ "projeMekan" ],
            "isTanimi"                    => $data[ "isTanimi" ],
            "amac"                        => $data[ "amac" ],
            "konsept"                     => $data[ "konsept" ],
            "icerikGunAkısDetay"          => $data[ "icerikGunAkısDetay" ],
            "markaAkreTipi"               => $data[ "markaAkreTipi" ],
            "karakteri"                   => $data[ "karakteri" ],
            "detaylar"                    => $data[ "detaylar" ],
            "butceAraligi"                => $data[ "butceAraligi" ],
            "butceDagilimi"               => $data[ "butceDagilimi" ],
            "oncekiDonemlerTaihAralıgı"   => $data[ "oncekiDonemlerTaihAralıgı" ],
            "ozelGeceler"                 => $data[ "ozelGeceler" ],
            "sanatciGala"                 => $data[ "sanatciGala" ],
            "konusmaci"                   => $data[ "konusmaci" ],
            "sunucuModerator"             => $data[ "sunucuModerator" ],
            "sovTeatral"                  => $data[ "sovTeatral" ],
            "acivite"                     => $data[ "acivite" ],
            "serbestZamanİcerikleri"      => $data[ "serbestZamanİcerikleri" ],
            "markaRenkKodlari"            => $data[ "markaRenkKodlari" ],
            "markaLogosuFontlariVector"   => $data[ "markaLogosuFontlariVector" ],
            "markaKurumsakKimlikDokumani" => $data[ "markaKurumsakKimlikDokumani" ],
            "tasarimsalNetBeklenti"       => $data[ "tasarimsalNetBeklenti" ],
            "twoDTasarimKalemleri"        => $data[ "2DTasarimKalemleri" ],
            "threeDTasarimKalemleri"      => $data[ "3DTasarimKalemleri" ],
            "DekorasyonSusleme"           => $data[ "DekorasyonSusleme" ],
            "MultiMediaTasarımKalemleri"  => $data[ "MultiMediaTasarımKalemleri" ],
            "webSitesi"                   => $data[ "webSitesi" ],
            "sosyalMedya"                 => $data[ "sosyalMedya" ],
            "etkinlikFilmi"               => $data[ "etkinlikFilmi" ],
            "diger"                       => $data[ "diger" ],
            "created_at"                  => now(),
            "updated_at"                  => now(),
        ];
        return $this->brief->create($createData);
    }

    public function update($id, array $data)
    {
        $brief                              = $this->brief->find($id);
        $brief->musteri                     = $data[ 'musteriId' ];
        $brief->referans                    = $data[ 'referansId' ];
        $brief->eventBaslangicTarihi        = $data[ 'eventBaslangicTarihi' ];
        $brief->eventBitisTarihi            = $data[ 'eventBitisTarihi' ];
        $brief->projeTeslimSekli            = $data[ 'projeTeslimSekli' ];
        $brief->ilgiliDepartman             = $data[ 'ilgiliDepartman' ];
        $brief->kisiSayisi                  = $data[ 'kisiSayisi' ];
        $brief->baslangicSaati              = $data[ 'baslangicSaati' ];
        $brief->bitisSaati                  = $data[ 'bitisSaati' ];
        $brief->projeEvSahibiProfili        = $data[ 'projeEvSahibiProfili' ];
        $brief->katlımcıProfiliHedefKitle   = $data[ 'katlımcıProfiliHedefKitle' ];
        $brief->kadınErkekDağılımıYüzde     = $data[ 'kadınErkekDağılımıYüzde' ];
        $brief->projeMekan                  = $data[ 'projeMekan' ];
        $brief->isTanimi                    = $data[ 'isTanimi' ];
        $brief->amac                        = $data[ 'amac' ];
        $brief->konsept                     = $data[ 'konsept' ];
        $brief->icerikGunAkısDetay          = $data[ 'icerikGunAkısDetay' ];
        $brief->markaAkreTipi               = $data[ 'markaAkreTipi' ];
        $brief->karakteri                   = $data[ 'karakteri' ];
        $brief->detaylar                    = $data[ 'detaylar' ];
        $brief->butceAraligi                = $data[ 'butceAraligi' ];
        $brief->butceDagilimi               = $data[ 'butceDagilimi' ];
        $brief->oncekiDonemlerTaihAralıgı   = $data[ 'oncekiDonemlerTaihAralıgı' ];
        $brief->ozelGeceler                 = $data[ 'ozelGeceler' ];
        $brief->sanatciGala                 = $data[ 'sanatciGala' ];
        $brief->konusmaci                   = $data[ 'konusmaci' ];
        $brief->sunucuModerator             = $data[ 'sunucuModerator' ];
        $brief->sovTeatral                  = $data[ 'sovTeatral' ];
        $brief->acivite                     = $data[ 'acivite' ];
        $brief->serbestZamanİcerikleri      = $data[ 'serbestZamanİcerikleri' ];
        $brief->markaRenkKodlari            = $data[ 'markaRenkKodlari' ];
        $brief->markaLogosuFontlariVector   = $data[ 'markaLogosuFontlariVector' ];
        $brief->markaKurumsakKimlikDokumani = $data[ 'markaKurumsakKimlikDokumani' ];
        $brief->tasarimsalNetBeklenti       = $data[ 'tasarimsalNetBeklenti' ];
        $brief->twoDTasarimKalemleri        = $data[ '2DTasarimKalemleri' ];
        $brief->threeDTasarimKalemleri      = $data[ '3DTasarimKalemleri' ];
        $brief->DekorasyonSusleme           = $data[ 'DekorasyonSusleme' ];
        $brief->MultiMediaTasarımKalemleri  = $data[ 'MultiMediaTasarımKalemleri' ];
        $brief->webSitesi                   = $data[ 'webSitesi' ];
        $brief->sosyalMedya                 = $data[ 'sosyalMedya' ];
        $brief->etkinlikFilmi               = $data[ 'etkinlikFilmi' ];
        $brief->diger                       = $data[ 'diger' ];
        $brief->created_at                  = now();
        $brief->updated_at                  = now();

        return $brief->save();
    }

    public function delete($id)
    {
        $brief = $this->brief->find($id);
        return $brief->delete();
    }
}