<div class="d-flex align-items-center">
    <div class="flex-shrink-0 chat-user-img {{ $statusClass }} user-own-img align-self-center me-3 ms-0">
        {!! $avatar !!}
        <span class="user-status"></span>
    </div>
    <div class="flex-grow-1 overflow-hidden">
        <h5 class="text-truncate mb-0 fs-16">
            <a class="text-reset username">{{ $user->name }}</a>
        </h5>
        <p class="text-truncate text-muted fs-14 mb-0 userStatus">
            <small>{{ ucfirst($user->status) }}</small>
        </p>
    </div>
</div>
