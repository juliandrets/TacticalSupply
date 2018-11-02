<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $keyType = 'string';
    protected $fillable	 = ['name', 'picture'];

    public function category()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
