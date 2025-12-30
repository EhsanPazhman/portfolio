<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'start_date',
        'end_date',
        'description'
    ];
        public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
