<?php

namespace App\Models;

use  App\Models\Country;

use Illuminate\Database\Eloquent\Model;

class VisaCategory extends Model
{
    protected $table = 'visa_category';

    public function countries()
    {
      return $this->hasMany(Country::class);
    }
}
