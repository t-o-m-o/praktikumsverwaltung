<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontaktliste extends Model
{
    public $timestamps = false;
    protected $table = 'kontaktliste';
    protected $fillable = [
        'Praktikum_ID', 'Datum', 'Kontaktbeschreibung'
    ];

    public function praktika()
    {
        return $this->hasOne(praktika::class, 'Praktikum_ID', 'Praktikum_ID');
    }
}
