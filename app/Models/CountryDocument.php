<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryDocument extends Model
{
    protected $fillable = ['document_id', 'country_id'];
    
    protected $table = 'country_document';
}
