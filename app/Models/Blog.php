<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\Country;

class Blog extends Model
{
    protected $table = 'blog';

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }
}
