<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpiritualLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'xp_required',
        'description',
        'icon',
        'color',
    ];

    // Relationships
    public function users()
    {
        return $this->hasMany(User::class, 'current_level_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }

    // Helper methods
    public function getNextLevel()
    {
        return self::where('order', '>', $this->order)
            ->orderBy('order', 'asc')
            ->first();
    }

    public function getPreviousLevel()
    {
        return self::where('order', '<', $this->order)
            ->orderBy('order', 'desc')
            ->first();
    }
}