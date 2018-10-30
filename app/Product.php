<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $keyType = 'string';
    protected $guarded = ['available', 'sold'];
}
