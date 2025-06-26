<div class="d-flex align-items-center px-4 mb-2">
    <div class="flex-grow-1">
        <h4 class="mb-0 fs-11 text-muted text-uppercase">Direct Messages</h4>
    </div>
    <div class="flex-shrink-0">
        <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="New Message">
            @if (auth()->check() &&
                    auth()->user()->hasAnyRole(['master']))
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-soft-success btn-sm shadow-none">
                    <i class="ri-add-line align-bottom"></i>
                </button>
            @endif
        </div>
    </div>
</div>
<div class="chat-message-list">
    @if ($chatPartners && $chatPartners->isNotEmpty())
        <ul class="list-unstyled chat-list chat-user-list" id="userList">
            @foreach ($chatPartners as $partner)
                <li id="contact-id-{{ $partner->id }}" data-name="direct-message">
                    <a href="javascript: void(0);" class="unread-msg-user">
                        <div class="d-flex align-items-center">
                            <div
                                class="flex-shrink-0 chat-user-img {{ $partner->status == 'online' ? 'online' : 'offline' }} align-self-center me-2 ms-0">
                                <div class="avatar-xxs">
                                    @if (!empty($partner->avatar) && file_exists(base_path('images/personil/' . $partner->avatar)))
                                        <!-- Avatar ditemukan di folder -->
                                        <img src="{{ asset('images/personil/' . $partner->avatar) }}"
                                            class="rounded-circle avatar-xxs" alt="{{ $partner->name }}">
                                    @else
                                        <!-- Gunakan inisial jika avatar tidak tersedia -->
                                        @php
                                            $nameParts = explode(' ', $partner->name);
                                            $initials = strtoupper(substr($nameParts[0], 0, 1));
                                            if (isset($nameParts[1])) {
                                                $initials .= strtoupper(substr($nameParts[1], 0, 1));
                                            }
                                        @endphp
                                        <span class="avatar-title rounded-circle bg-primary fs-10">
                                            {{ $initials }}
                                        </span>
                                    @endif
                                    <span class="user-status"></span>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-truncate mb-0">{{ $partner->name }}</p>
                            </div>
                            <div class="ms-auto">
                                @if ($partner->messagecount > 0)
                                    <span
                                        class="badge bg-dark-subtle text-body rounded p-1">{{ $partner->messagecount }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="ms-4">No Chat</p>
    @endif
</div>
