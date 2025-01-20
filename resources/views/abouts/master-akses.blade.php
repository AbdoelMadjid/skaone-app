@role(['master'])
    <li class="nav-item ms-auto">
        <div class="dropdown">
            <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button" id="dropdownMenuLink1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ri-settings-4-line align-middle me-1"></i> Settings
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                <li>
                    <a href="{{ route('about.kumpulan-faqs.index') }}" class="dropdown-item">FAQs</a>
                </li>
                <li>
                    <a href="{{ route('about.fitur-coding.index') }}" class="dropdown-item">Fitur Coding</a>
                </li>
                <li>
                    <a href="{{ route('about.team-pengembang.index') }}" class="dropdown-item">Development Team</a>
                </li>
                <li>
                    <a href="{{ route('about.photo-slides.index') }}" class="dropdown-item">Photo Slide</a>
                </li>
                <li>
                    <a href="{{ route('about.galery.index') }}" class="dropdown-item">Galery</a>
                </li>
                <li>
                    <a href="{{ route('about.photo-jurusan.index') }}" class="dropdown-item">Photo Jurusan</a>
                </li>
                <li>
                    <a href="{{ route('about.daily-messages.index') }}" class="dropdown-item">Daily Messages</a>
                </li>
                <li>
                    <a href="{{ route('about.events.index') }}" class="dropdown-item">Event</a>
                </li>
                <li>
                    <a href="{{ route('about.berita.index') }}" class="dropdown-item">Berita</a>
                </li>
                {{-- <li><a class="dropdown-item" href="#">Search Settings</a></li>
                <li><a class="dropdown-item" href="#">Advanced Search</a></li>
                <li><a class="dropdown-item" href="#">Search History</a></li>
                <li><a class="dropdown-item" href="#">Search Help</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="#">Dark Mode:Off</a></li> --}}
            </ul>
        </div>
    </li>
@endrole
