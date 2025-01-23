<?php

namespace Dovaldev\FilamentSimpleSeo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    // filamentphp fillable fields
    protected $guarded = [];

    public function seoable()
    {
        return $this->morphTo();
    }

}
