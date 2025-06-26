<div class="chat-room-list pt-3" data-simplebar>
    <div class="sort-contact">
        @forelse ($contacts as $initial => $group)
            <div class="mt-3">
                <div class="contact-list-title">{{ $initial }}</div>
                <ul id="contact-sort-{{ $initial }}" class="list-unstyled contact-list">
                    @foreach ($group as $contact)
                        <li id="contact-id-{{ $contact->id }}" data-name="contact">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar-xxs">
                                        @if (!empty($contact->avatar) && file_exists(base_path('images/personil/' . $contact->avatar)))
                                            <!-- Avatar ditemukan di folder personil -->
                                            <img src="{{ asset('images/personil/' . $contact->avatar) }}"
                                                class="rounded-circle avatar-xxs" alt="">
                                        @else
                                            <!-- Gunakan inisial jika avatar tidak tersedia -->
                                            @php
                                                $nameParts = explode(' ', $contact->name);
                                                $initials = strtoupper(substr($nameParts[0], 0, 1));
                                                if (isset($nameParts[1])) {
                                                    $initials .= strtoupper(substr($nameParts[1], 0, 1));
                                                }
                                            @endphp
                                            <span class="avatar-title rounded-circle bg-primary fs-10">
                                                {{ $initials }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-truncate contactlist-name mb-0">
                                        {{ $contact->name }}
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="dropdown">
                                        <a href="#" class="text-muted" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-pencil-line text-muted me-2 align-bottom"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-forbid-2-line text-muted me-2 align-bottom"></i>Block</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-delete-bin-6-line text-muted me-2 align-bottom"></i>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @empty
            <li class="text-center">Belum ada kontak yang tersedia.</li>
        @endforelse
    </div>
</div>
