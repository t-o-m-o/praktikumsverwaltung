<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class praktikazeitraeume extends Model
{
    public $timestamps = false;
    protected $table = 'praktikazeitraeume';
    protected $primaryKey = 'Praktikumszeit_ID';
    protected $fillable = [
        'Start', 'Ende'
    ];


    public function praktika()
    {
        return $this->hasMany(praktika::class, 'Praktikumszeit_ID', 'Praktikumszeit_ID');
    }

}
