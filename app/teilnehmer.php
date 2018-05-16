<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teilnehmer extends Model
{
    protected $table = 'teilnehmer';
    protected $primaryKey = 'Teilnehmer_ID';
    public $timestamps = false;

    protected $fillable = [
        'Teilnehmer_ID', 'Semester_ID', 'Berufsziel_ID', 'Vorname', 'Nachname'
    ];


    public function praktika()
    {
        return $this->hasMany(praktika::class,'Teilnehmer_ID','Teilnehmer_ID');
    }

    public function semester()
    {
        return $this->belongsTo(semester::class,'Semester_ID','Semester_ID');
    }

    public function berufsziel()
    {
        return $this->hasOne(berufsziel::class,'Berufsziel_ID','Berufsziel_ID');
    }
}
