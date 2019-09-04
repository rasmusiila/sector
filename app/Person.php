<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $casts = [
        'sectors' => 'array'
    ];

    public function sectors()
    {
        return $this->morphMany('App/Sector', 'sectorable');
    }
}
