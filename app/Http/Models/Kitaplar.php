<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Kitaplar extends Model
{
    protected $table="kitaplar";

    protected $fillable=['kitap_adi','kitap_turu','kitap_sayfa'];
}
