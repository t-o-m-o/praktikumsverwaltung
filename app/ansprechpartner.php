<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ansprechpartner extends Model
{
    public $timestamps = false;
    protected $table = 'ansprechpartner';
    protected $primaryKey = 'Ansprechpartner_ID';
    protected $fillable = [
        'Vorname', 'Nachname', 'Telefon','Email'
    ];

    public function ansprechpartnerliste()
    {
        return $this->hasMany(ansprechpartnerliste::class, 'Ansprechpartner_ID', 'Ansprechpartner_ID');
    }

    public function berufsziele()
    {
        return $this->hasManyThrough(berufsziel::class, ansprechpartnerliste::class,
            'Ansprechpartner_ID', 'Berufsziel_ID', 'Ansprechpartner_ID', 'Berufsziel_ID');

    }

    public function firmen()
    {
        return $this->hasManyThrough(firmen::class, ansprechpartnerliste::class,
            'Ansprechpartner_ID', 'Firmen_ID', 'Ansprechpartner_ID', 'Firmen_ID');

    }

}
