<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed minimal 5 channels
        $channels = [
            ['name' => 'General Chat', 'creator_id' => 27, 'messagecount' => 10],
            ['name' => 'Development Team', 'creator_id' => 27, 'messagecount' => 15],
            ['name' => 'Marketing', 'creator_id' => 71, 'messagecount' => 8],
            ['name' => 'Support Group', 'creator_id' => 72, 'messagecount' => 5],
            ['name' => 'Announcements', 'creator_id' => 72, 'messagecount' => 20],
        ];

        foreach ($channels as $channel) {
            Channel::create($channel);
        }
    }
}
