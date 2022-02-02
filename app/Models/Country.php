<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use  App\Models\VisaCategory;
use  App\Models\Document;
use  App\Models\Blog;

class Country extends Model
{
    protected $table = 'country';

    public function categories()
    {
      return $this->belongsTo(VisaCategory::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function blogs()
    {
      return $this->hasMany(Blog::class);
    }
}
