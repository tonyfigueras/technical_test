<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'asunto','user_id', 'name', 'status','destino','mensaje'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class, 'user_id');
    }
}
