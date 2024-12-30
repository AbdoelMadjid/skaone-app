<div class="d-flex align-items-center px-4 mt-4 pt-2 mb-2">
    <div class="flex-grow-1">
        <h4 class="mb-0 fs-11 text-muted text-uppercase">Channels</h4>
    </div>
    <div class="flex-shrink-0">
        <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Create group">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-soft-success btn-sm">
                <i class="ri-add-line align-bottom"></i>
            </button>
        </div>
    </div>
</div>
<div class="chat-message-list">
    <ul id="channelList" class="list-unstyled chat-list chat-user-list mb-0">
        @foreach ($channels as $channel)
            <li id="contact-id-{{ $channel->id }}" data-name="channel">
                <a href="javascript: void(0);">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 chat-user-img align-self-center me-2 ms-0">
                            <div class="avatar-xxs">
                                <div class="avatar-title bg-light rounded-circle text-body">#</div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-truncate mb-0">{{ $channel->name }}</p>
                            <small id="created">
                                Created by:
                                @php
                                    $creatorName = $channel->user->name ?? 'Unknown';
                                    $initials = implode(
                                        '',
                                        array_map(fn($word) => strtoupper($word[0]), explode(' ', $creatorName)),
                                    );
                                    echo $initials;
                                @endphp
                            </small>
                            <small id="count-member">Members: {{ $channel->users->count() }}</small>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
