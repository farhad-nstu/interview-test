<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Categoryl;

class Proposal extends Model
{
    protected $fillable = [
        'category_id', 'customer_id', 'number'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
