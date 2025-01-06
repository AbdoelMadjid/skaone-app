<div>
    <div class="tabs">
        <button wire:click="$set('currentTab', 'chats')">Chats</button>
        <button wire:click="$set('currentTab', 'contacts')">Contacts</button>
    </div>

    @if ($currentTab == 'chats')
        <div class="chats">
            @foreach ($chats as $chat)
                <div wire:click="chatSelected({{ $chat->id }})">
                    {{ $chat->user->name }} ({{ $chat->messagecount }} unread)
                </div>
            @endforeach

            <div class="channels">
                @foreach ($channels as $channel)
                    <div wire:click="channelSelected({{ $channel->id }})">
                        {{ $channel->name }} ({{ $channel->messagecount }} messages)
                    </div>
                @endforeach
            </div>
        </div>
    @elseif ($currentTab == 'contacts')
        @livewire('contacts-component')
    @endif
</div>
