<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    protected $table = 'semester';
    protected $primaryKey = 'Semester_ID';
    public $timestamps = false;

    protected $fillable = [
        'Semesterbezeichnung'
    ];

    public function teilnehmer()
    {
        return $this->hasMany(teilnehmer::class,'Semester_ID','Semester_ID');
    }

    public function praktika()
    {
        return $this->hasManyThrough(praktika::class, teilnehmer::class,
            'Semester_ID','Teilnehmer_ID','Semester_ID','Teilnehmer_ID');
    }
}
