<div>
    <div style="max-height: 300px; overflow-y: auto;">
        @foreach ($messages as $message)
            <div>
                <strong>{{ $message['user'] }}</strong>: {{ $message['message'] }}
            </div>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage">
        <input type="text" wire:model="newMessage" placeholder="Type a message..." />
        <button type="submit">Send</button>
    </form>
</div>
