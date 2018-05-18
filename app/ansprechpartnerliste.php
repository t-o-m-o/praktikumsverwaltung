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
        return $this->hasOne(ansprechpartner::class, 'Ansprechpartner_ID', 'Ansprechpartner_ID');
    }

    public function berufsziel()
    {
        return $this->hasOne(berufsziel::class, 'Berufsziel_ID', 'Berufsziel_ID');
    }

    public function firmen()
    {
        return $this->hasMany(firmen::class,'Firmen_ID','Firmen_ID');
    }
}
