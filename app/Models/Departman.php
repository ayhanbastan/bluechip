<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departman extends Model
{
    protected $table    = 'departmanlar';
    protected $fillable = [ 'departmanId', 'departmanAd' ];

    public function briefs()
    {
        return $this->hasMany(Brief::class,'ilgiliDepartman','departmanId');
    }
}
