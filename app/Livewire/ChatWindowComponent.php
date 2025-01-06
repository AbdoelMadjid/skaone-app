<?php

namespace App\Livewire;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatWindowComponent extends Component
{
    public $messages;
    public $message;
    public $currentChat = null;
    public $currentChannel = null;
    public $currentContact = null;

    protected $listeners = ['loadChatMessages', 'loadChannelMessages', 'startNewChat'];

    public function loadChatMessages($chatId)
    {
        $this->currentChat = Chat::find($chatId);
        $this->currentChannel = null;
        $this->currentContact = null;
        $this->messages = Chat::where(function ($query) use ($chatId) {
            $query->where('user_id', Auth::id())
                ->where('recipient_id', $chatId);
        })->orWhere(function ($query) use ($chatId) {
            $query->where('user_id', $chatId)
                ->where('recipient_id', Auth::id());
        })->get();
    }

    public function loadChannelMessages($channelId)
    {
        $this->currentChannel = Channel::find($channelId);
        $this->currentChat = null;
        $this->currentContact = null;
        // Load channel messages
    }

    public function startNewChat($contactId)
    {
        $chat = Chat::firstOrCreate([
            'user_id' => Auth::id(),
            'recipient_id' => $contactId,
        ]);

        $this->currentContact = User::find($contactId);
        $this->currentChat = $chat;
        $this->currentChannel = null;
        $this->loadChatMessages($chat->id);
    }

    public function sendMessage()
    {
        if ($this->currentChat) {
            Chat::create([
                'user_id' => Auth::id(),
                'recipient_id' => $this->currentChat->recipient_id,
                'last_message' => $this->message,
                'last_message_at' => now(),
                'read' => false,
            ]);

            $this->loadChatMessages($this->currentChat->id);
            $this->message = '';
        }
    }

    public function render()
    {
        return view('livewire.chat-window-component');
    }
}
