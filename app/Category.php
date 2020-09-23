<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Proposal;

class Category extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function proposals(){
        return $this->hasMany(Proposal::class);
    }
}
