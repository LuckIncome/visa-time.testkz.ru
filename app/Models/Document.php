<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use  App\Models\Country;

class Document extends Model
{
    protected $table = 'document';

    public function country()
    {
        return $this->belongsToMany(Country::class);
    }
}
