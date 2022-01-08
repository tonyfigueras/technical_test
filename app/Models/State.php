<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id','country_id', 'name'
    ];
    
    public function country()
    {
        return $this->belongsTo('App\Models\Country'::class, 'country_id');
    }
}
