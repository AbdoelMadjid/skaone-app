<?php

namespace App\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $messages = [];
    public $newMessage;

    public function sendMessage()
    {
        if (trim($this->newMessage) !== '') {
            $this->messages[] = [
                'user' => 'User', // Bisa diganti dengan nama user dari auth
                'message' => $this->newMessage,
            ];
            $this->newMessage = '';
        }
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
