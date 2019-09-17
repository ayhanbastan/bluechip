<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontat extends Model
{
    protected $table      = 'kontak';
    protected $fillable   = [ 'adsoyad', 'telefon', 'email', 'pozisyon', 'sirketId' ];
    public    $timestamps = false;
}
