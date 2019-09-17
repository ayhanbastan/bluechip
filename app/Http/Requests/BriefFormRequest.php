<?php
declare( strict_types = 1 );

namespace App\Http\Requests;

class BriefFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            "musteriId"                   => "required|integer",
            "referansId"                  => "required|integer",
            "eventBaslangicTarihi"        => "present|nullable|date|date_format:Y-m-d",
            "eventBitisTarihi"            => "present|nullable|date|date_format:Y-m-d",
            "projeTeslimSekli"            => "present|nullable|string",
            "ilgiliDepartman"             => "required|integer",
            "kisiSayisi"                  => "present|nullable|string",
            "baslangicSaati"              => "present|nullable|string",
            "bitisSaati"                  => "present|nullable|string",
            "projeEvSahibiProfili"        => "present|nullable|string",
            "katlımcıProfiliHedefKitle"   => "present|nullable|string",
            "kadınErkekDağılımıYüzde"     => "present|nullable|string",
            "projeMekan"                  => "present|nullable|string",
            "isTanimi"                    => "present|nullable|string",
            "amac"                        => "present|nullable|string",
            "konsept"                     => "present|nullable|string",
            "icerikGunAkısDetay"          => "present|nullable|string",
            "markaAkreTipi"               => "present|nullable|string",
            "karakteri"                   => "present|nullable|string",
            "detaylar"                    => "present|nullable|string",
            "butceAraligi"                => "present|nullable|string",
            "butceDagilimi"               => "present|nullable|string",
            "oncekiDonemlerTaihAralıgı"   => "present|nullable|string",
            "ozelGeceler"                 => "present|nullable|string",
            "sanatciGala"                 => "present|nullable|string",
            "konusmaci"                   => "present|nullable|string",
            "sunucuModerator"             => "present|nullable|string",
            "sovTeatral"                  => "present|nullable|string",
            "acivite"                     => "present|nullable|string",
            "serbestZamanİcerikleri"      => "present|nullable|string",
            "markaRenkKodlari"            => "present|nullable|string",
            "markaLogosuFontlariVector"   => "present|nullable|string",
            "markaKurumsakKimlikDokumani" => "present|nullable|string",
            "tasarimsalNetBeklenti"       => "present|nullable|string",
            "2DTasarimKalemleri"          => "present|nullable|string",
            "3DTasarimKalemleri"          => "present|nullable|string",
            "DekorasyonSusleme"           => "present|nullable|string",
            "MultiMediaTasarımKalemleri"  => "present|nullable|string",
            "webSitesi"                   => "present|nullable|string",
            "sosyalMedya"                 => "present|nullable|string",
            "etkinlikFilmi"               => "present|nullable|string",
            "diger"                       => "present|nullable|string",

        ];
    }
}