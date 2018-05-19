<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berufsziel extends Model
{
    public $timestamps = false;
    protected $table = 'berufsziel';
    protected $primaryKey = 'Berufsziel_ID';
    protected $fillable = [
        'Berufszielbezeichnung'
    ];

    public function teilnehmer()
    {
        return $this->hasMany(teilnehmer::class, 'Berufsziel_ID', 'Berufsziel_ID');
    }

    public function ansprechpartnerliste()
    {
        return $this->belongsTo(ansprechpartnerliste::class,'Berufsziel_ID','Berufsziel_ID');
    }
}
