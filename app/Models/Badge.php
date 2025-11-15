<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'category',
        'xp_reward',
        'requirements',
    ];

    protected $casts = [
        'requirements' => 'array',
    ];

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badges')
            ->withTimestamp('earned_at')
            ->withTimestamps();
    }

    // Award badge to user
    public function awardTo(User $user)
    {
        if (!$user->badges->contains($this->id)) {
            $user->badges()->attach($this->id, [
                'earned_at' => now(),
            ]);

            // Award XP
            if ($this->xp_reward > 0) {
                $user->progress->addXP($this->xp_reward);
            }

            return true;
        }

        return false;
    }
}