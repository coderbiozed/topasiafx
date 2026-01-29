<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'avatar',
        'bio',
        'address',
    ];

    // Relation back to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    
    
}


