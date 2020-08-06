<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class video extends Model
{
    protected $fillable = [
        'name', 'video','descrebtion','photo','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
