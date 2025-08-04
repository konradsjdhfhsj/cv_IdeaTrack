<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Osoby extends Model
{
    protected $table = 'osoby';
    public $timestamps = true;  

    protected $fillable = [
        'imie', 
        'nazwisko',
        'wiek',
        'email',
        'haslo'
    ];
}
