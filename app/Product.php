<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'price', 'qty',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
