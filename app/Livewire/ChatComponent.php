<?php

namespace App\Livewire;

use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatComponent extends Component
{
    public $chats;
    public $channels;
    public $currentTab = 'chats';

    protected $listeners = ['chatSelected', 'channelSelected', 'contactSelected'];

    public function mount()
    {
        $currentUserId = Auth::id();

        $this->chats = Chat::where('user_id', $currentUserId)
            ->orWhere('recipient_id', $currentUserId)
            ->with(['user', 'recipient'])
            ->orderBy('last_message_at', 'desc')
            ->get();

        $this->channels = Channel::with('user', 'users')
            ->where('creator_id', $currentUserId)
            ->orWhereHas('users', function ($query) use ($currentUserId) {
                $query->where('user_id', $currentUserId);
            })
            ->get();
    }

    public function chatSelected($chatId)
    {
        $this->emit('loadChatMessages', $chatId);
    }

    public function channelSelected($channelId)
    {
        $this->emit('loadChannelMessages', $channelId);
    }

    public function contactSelected($contactId)
    {
        $this->emit('startNewChat', $contactId);
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
