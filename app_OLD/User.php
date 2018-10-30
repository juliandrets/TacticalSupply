<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Wish;
use App\Product;

class User extends Authenticatable
{
    use Notifiable;

    // Auth::user()->wishes()->toggle(2)

    public function wishes() {
        // product por que quiero recibir productos
        return $this->belongsToMany(Product::class, 'wishes', 'user_id', 'product_id');
    }

    public function cart() {
        // product por que quiero recibir productos
        return $this->belongsToMany(Product::class, 'carts', 'user_id', 'product_id');
    }

    public function notifications() {
        return $this->belongsToMany(Product::class, 'notifications', 'user_id', 'product_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
