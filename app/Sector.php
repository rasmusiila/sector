<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $primaryKey = 'registry_id';

    public function sectorable()
    {
        return $this->morphTo();
    }

    public function children()
    {
        return Sector::where('parent_id', $this->registry_id)->get();
    }
}
