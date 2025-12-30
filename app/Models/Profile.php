<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_title',
        'bio',
        'about_text',
        'avatar',
        'status',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
    public function socialLinks(): HasMany
    {
        return $this->hasMany(SocialLink::class);
    }
    public function slills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
}
