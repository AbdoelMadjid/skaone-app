<?php

namespace Database\Seeders;

use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User ID 27 dan ID 72 (anggap ini adalah ID pengguna yang aktif)
        $userId = 27;
        $recipientId = 71;

        // Percakapan acak antara 27 dan 72
        $messages = [
            'Hello, how are you?',  // User 27 to 72
            'I\'m doing great, thanks! How about you?',  // User 72 to 27
            'I\'m good, just a bit busy with work.',  // User 27 to 72
            'That\'s understandable. How is work going?',  // User 72 to 27
            'It\'s hectic, but I\'m managing.',  // User 27 to 72
            'Keep pushing! You\'ll get through it.',  // User 72 to 27
            'Thanks! How about your project?',  // User 27 to 72
            'It\'s going well, but still a lot to do.',  // User 72 to 27
            'Don\'t worry, you got this!',  // User 27 to 72
            'I hope so. Let\'s catch up soon!'  // User 72 to 27
        ];

        // Generate chat data
        foreach ($messages as $index => $message) {
            // If the index is even, it's from user 27 to user 72, else it's from user 72 to user 27
            Chat::create([
                'user_id' => ($index % 2 == 0) ? $userId : $recipientId,  // User 27 sends on even, User 72 sends on odd
                'recipient_id' => ($index % 2 == 0) ? $recipientId : $userId, // Recipient alternates
                'last_message' => $message,
                'last_message_at' => Carbon::now()->subMinutes(rand(0, 60)), // Random timestamp within the last hour
            ]);
        }
    }
}
