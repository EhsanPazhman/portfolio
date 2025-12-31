<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
    ];
        public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
