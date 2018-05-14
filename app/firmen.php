<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class firmen extends Model
{
    public $timestamps = false;
    protected $table = 'firmen';
    protected $primaryKey = 'Firmen_ID';
    protected $fillable = [
        'Firmenname', 'Firmenbezeichnung', 'Firmenwebseite', 'Strasse', 'PLZ', 'Ort', 'Telefon', 'Email'
    ];

    public function ansprechpartner()
    {
        $bid = $this->hasManyThrough(berufsziel::class, ansprechpartnerliste::class,
            'Firmen_ID','Berufsziel_ID','Firmen_ID','Berufsziel_ID')->get();
        return $this->hasManyThrough(ansprechpartner::class, ansprechpartnerliste::class,
            'Firmen_ID', 'Ansprechpartner_ID','Firmen_ID','Ansprechpartner_ID')->whereIn('Berufsziel_ID',$bid);
    }

    public function ansprechpartnerliste()
    {
        return $this->hasMany(ansprechpartnerliste::class,'Firmen_ID','Firmen_ID');

    }

    public function praktika()
     {
         return $this->hasMany(praktika::class,'Firmen_ID','Firmen_ID');
     }


}