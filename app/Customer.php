<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proposal;

class Customer extends Model
{
    protected $fillable = [
        'name', 'uniq_id', 'email', 'mobile', 'image',
    ];

    public function proposals(){
        return $this->hasMany(Proposal::class);
    }
}
