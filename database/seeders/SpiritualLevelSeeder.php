<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpiritualLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Seeker',
                'order' => 1,
                'xp_required' => 0,
                'description' => 'Beginning your journey of faith, exploring what it means to follow Christ.',
                'icon' => '🔍',
                'color' => '#gray-500',
            ],
            [
                'name' => 'Believer',
                'order' => 2,
                'xp_required' => 100,
                'description' => 'Established in salvation truths, understanding the foundations of faith.',
                'icon' => '✝️',
                'color' => '#blue-500',
            ],
            [
                'name' => 'Disciple',
                'order' => 3,
                'xp_required' => 300,
                'description' => 'Learning obedience and discipline, walking daily with Christ.',
                'icon' => '📖',
                'color' => '#green-500',
            ],
            [
                'name' => 'Servant',
                'order' => 4,
                'xp_required' => 600,
                'description' => 'Engaged in ministry and service, using your gifts for the Kingdom.',
                'icon' => '🙏',
                'color' => '#yellow-500',
            ],
            [
                'name' => 'Steward',
                'order' => 5,
                'xp_required' => 1000,
                'description' => 'Leading with character and wisdom, managing Kingdom resources.',
                'icon' => '👑',
                'color' => '#orange-500',
            ],
            [
                'name' => 'Herald',
                'order' => 6,
                'xp_required' => 1500,
                'description' => 'Influencing culture and fulfilling your kingdom mandate.',
                'icon' => '📣',
                'color' => '#purple-500',
            ],
            [
                'name' => 'Ambassador',
                'order' => 7,
                'xp_required' => 2500,
                'description' => 'Mature representative of Christ, carrying His authority and wisdom.',
                'icon' => '🕊️',
                'color' => '#gold-500',
            ],
        ];

        foreach ($levels as $level) {
            DB::table('spiritual_levels')->insert(array_merge($level, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}