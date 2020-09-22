<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'uniq_id', 'email', 'mobile', 'image',
    ];
}
