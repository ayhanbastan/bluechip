<?php
declare( strict_types = 1 );

namespace App\Core\Services;

use App\Models\Kontat;

class KontakSevice
{

    private $kontat;

    public function __construct(Kontat $kontat)
    {
        $this->kontat = $kontat;
    }

    public function create(array $data)
    {
        $creataData = [
            "adsoyad"  => $data[ "adsoyad" ],
            "telefon"  => $data[ "telefon" ],
            "email"    => $data[ "email" ],
            "pozisyon" => $data[ "pozisyon" ],
            "sirketId" => $data[ "sirketId" ],
        ];
        $kontak     = $this->kontat->create($creataData);
        return $kontak;
    }

    public function update($id, array $data)
    {
        $kontak           = $this->kontat->find($id);
        $kontak->adsoyad  = $data[ "adsoyad" ];
        $kontak->telefon  = $data[ "telefon" ];
        $kontak->email    = $data[ "email" ];
        $kontak->pozisyon = $data[ "pozisyon" ];
        $kontak->sirketId = $data[ "sirketId" ];
        return $kontak->save();
    }

    public function delete($id)
    {
        $kontak = $this->kontat->find($id);
        return $kontak->delete();
    }
}