<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id','state_id', 'name'
    ];
    public function state()
    {
        return $this->belongsTo('App\Models\State'::class, 'state_id');
    }
}
