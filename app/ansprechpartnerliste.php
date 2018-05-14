<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ansprechpartnerliste extends Model
{
    public $timestamps = false;
    protected $table = 'ansprechpartnerliste';
    protected $fillable = [
        'Firmen_ID', 'Berufsziel_ID', 'Ansprechpartner_ID'
    ];

    public function ansprechpartner()
    {
        return $this->hasMany(ansprechpartner::class,'Ansprechpartner_ID','Ansprechpartner_ID');
    }
/*
    public function berufsziel()
    {
        return $this->hasOne(berufsziel::class);
    }
*/
    public function firmen()
    {
        return $this->hasMany(firmen::class,'Firmen_ID','Firmen_ID');
    }
}
