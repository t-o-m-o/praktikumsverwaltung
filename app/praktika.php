<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class praktika extends Model
{
    public $timestamps = false;
    protected $table = 'praktika';
    protected $primaryKey = 'Praktikum_ID';
    protected $fillable = [
        'Teilnehmer_ID', 'Firmen_ID', 'Praktikumszeit_ID', 'Status'
    ];

public function teilnehmer()
    {
        return $this->belongsTo(teilnehmer::class,'Teilnehmer_ID','Teilnehmer_ID');
    }

    public function praktikazeitraeume()
    {
        return $this->hasOne(praktikazeitraeume::class,'Praktikumszeit_ID','Praktikumszeit_ID');
    }

    public function firmen()
    {
        return $this->hasOne(firmen::class,'Firmen_ID','Firmen_ID');
    }
}
