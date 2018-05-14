<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berufsziel extends Model
{
    protected $table = 'berufsziel';
    protected $primaryKey = 'Berufsziel_ID';
    public $timestamps = false;

    protected $fillable = [
        'Berufszielbezeichnung'
    ];

    public function teilnehmer()
    {
        return $this->belongsTo(teilnehmer::class,'Berufsziel_ID','Berufsziel_ID');
    }

    public function ansprechpartnerliste()
    {
        return $this->belongsTo(ansprechpartnerliste::class,'Berufsziel_ID','Berufsziel_ID');
    }
}
