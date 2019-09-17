<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referans extends Model
{
    protected $table = 'referans';
    protected $fillable = ['musteriId','musteri','referansNo','referansAd'];
    public $timestamps = false;

    public function customers()
    {
        return $this->belongsTo(CustomerDefination::class,'id','musteriId');
    }
}
