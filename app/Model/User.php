<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table      = 'kullanici';
    protected $fillable   = [ 'adsoyad', 'telefon', 'email', 'pozisyon' ];
    public    $timestamps = false;
}
