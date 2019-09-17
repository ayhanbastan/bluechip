<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerDefination extends Model
{
    protected $table      = 'musteri';
    protected $fillable   = [ 'id', 'ad', 'uniqId' ];
    public    $timestamps = false;

    public function briefs()
    {
        return $this->hasMany(Brief::class, 'id', 'musteri');
    }

    public function referans()
    {
        return $this->hasMany(Referans::class, 'id', 'musteriId');
    }
}
