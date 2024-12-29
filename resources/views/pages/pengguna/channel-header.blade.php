<div class="d-flex align-items-center">
    <div class="flex-shrink-0 chat-user-img align-self-center me-3 ms-0">
        <div class="avatar-xxs">
            <div class="avatar-title bg-light rounded-circle text-body">#</div>
        </div>
    </div>
    <div class="flex-grow-1 overflow-hidden">
        <h5 class="text-truncate mb-0 fs-16">{{ $channel->name }}</h5>
        <p class="text-muted fs-14 mb-0">Created by: {{ $channel->user->name }}</p>
    </div>
</div>
