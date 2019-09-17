<?php
declare( strict_types = 1 );

namespace App\Core\Services;

use App\Model\User;

class UserService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
        $createData = [
            "adsoyad"  => $data[ "adsoyad" ],
            "telefon"  => $data[ "telefon" ],
            "email"    => $data[ "email" ],
            "pozisyon" => $data[ "pozisyon" ],
        ];
        $user       = $this->user->create($createData);
        return $user;
    }

    public function update($id, array $data)
    {
        $user           = $this->user->find($id);
        $user->adsoyad  = $data[ "adsoyad" ];
        $user->telefon  = $data[ "telefon" ];
        $user->email    = $data[ "email" ];
        $user->pozisyon = $data[ "pozisyon" ];
        return $user->save();
    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        return $user->delete();
    }
}