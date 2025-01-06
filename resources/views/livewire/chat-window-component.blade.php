<!-- resources/views/livewire/chat-window-component.blade.php -->
<div>
    @if ($currentChat)
        <div>
            <h2>{{ $currentChat->recipient->name }}</h2>
            <div class="chat-messages">
                @foreach ($messages as $message)
                    <div>
                        <strong>{{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}:</strong>
                        {{ $message->last_message }}
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <input type="text" wire:model="message" wire:keydown.enter="sendMessage">
            <button wire:click="sendMessage">Send</button>
        </div>
    @elseif ($currentChannel)
        <div>
            <h2>{{ $currentChannel->name }}</h2>
            <!-- Display channel messages -->
        </div>
    @elseif ($currentContact)
        <div>
            <h2>{{ $currentContact->name }}</h2>
            <div class="chat-messages">
                @foreach ($messages as $message)
                    <div>
                        <strong>{{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}:</strong>
                        {{ $message->last_message }}
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <input type="text" wire:model="message" wire:keydown.enter="sendMessage">
            <button wire:click="sendMessage">Send</button>
        </div>
    @else
        <div>Select a chat or channel to start messaging</div>
    @endif
</div>
