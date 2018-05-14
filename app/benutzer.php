<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class benutzer extends Model
{
    protected $table = 'benutzer';
    protected $primaryKey = 'Benutzer_ID';
    public $timestamps = false;

    protected $fillable = [
        'Firmen_ID', 'Berufsziel_ID', 'Ansprechpartner_ID'
    ];

}
