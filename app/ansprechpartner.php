<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ansprechpartner extends Model
{
    protected $table = 'ansprechpartner';
    protected $primaryKey = 'Ansprechpartner_ID';
    public $timestamps = false;

    protected $fillable = [
        'Vorname', 'Nachname', 'Telefon','Email'
    ];

    public function ansprechpartnerliste()
    {
        return $this->belongsTo(ansprechpartnerliste::class,'Ansprechpartner_ID','Ansprechpartner_ID');
    }

}
