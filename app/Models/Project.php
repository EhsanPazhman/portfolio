<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'title',
        'description',
        'image',
        'github_url',
        'demo_url',
    ];
        public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
