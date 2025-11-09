<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'week_number',
        'type',
        'file_path',
        'external_link',
        'uploaded_by',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function views()
    {
        return $this->hasMany(ResourceView::class);
    }

    // Get week title based on curriculum
    public function getWeekTitleAttribute()
    {
        $weeks = [
            1 => 'Week 1: Kingdom Perspectives',
            2 => 'Week 2: Spiritual Formation & Discipleship',
            3 => 'Week 3: Prayer & Intercession',
            4 => 'Week 4: Worship & Creative Expression',
            5 => 'Week 5: Prophetic Ministry',
            6 => 'Week 6: Evangelism & Missions',
            7 => 'Week 7: Apostolic Leadership & Governance',
            8 => 'Week 8: Culture & Reformation',
            9 => 'Week 9: Practicum - Ministry Simulation',
            10 => 'Week 10: Mentoring & Accountability',
            11 => 'Week 11: Strategy & Vision Casting',
            12 => 'Week 12: Commissioning & Graduation',
        ];

        return $weeks[$this->week_number] ?? 'Week ' . $this->week_number;
    }
}