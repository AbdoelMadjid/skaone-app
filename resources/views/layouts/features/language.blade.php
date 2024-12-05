<div class="dropdown ms-1 topbar-head-dropdown header-item">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @switch(Session::get('lang'))
            @case('en')
                <img src="{{ URL::asset('build/images/flags/us.svg') }}" class="rounded" alt="Header Language" height="20">
            @break

            {{--             @case('ru')
                <img src="{{ URL::asset('build/images/flags/russia.svg') }}" class="rounded" alt="Header Language"
                    height="20">
            @break --}}
            {{-- @case('it')
                <img src="{{ URL::asset('build/images/flags/italy.svg') }}" class="rounded" alt="Header Language"
                    height="20">
            @break --}}
            {{--             @case('sp')
                <img src="{{ URL::asset('build/images/flags/spain.svg') }}" class="rounded" alt="Header Language"
                    height="20">
            @break --}}

            {{--             @case('ch')
                <img src="{{ URL::asset('build/images/flags/china.svg') }}" class="rounded" alt="Header Language"
                    height="20">
            @break --}}

            {{--             @case('fr')
                <img src="{{ URL::asset('build/images/flags/french.svg') }}" class="rounded" alt="Header Language"
                    height="20">
            @break --}}

            {{--             @case('gr')
                <img src="{{ URL::asset('build/images/flags/germany.svg') }}" class="rounded" alt="Header Language"
                    height="20">
            @break --}}

            {{--             @case('ae')
                <img src="{{ URL::asset('build/images/flags/ae.svg') }}" class="rounded" alt="Header Language" height="20">
            @break --}}

            @default
                <img src="{{ URL::asset('build/images/flags/id.svg') }}" class="rounded" alt="Header Language" height="20">
        @endswitch
    </button>
    <div class="dropdown-menu dropdown-menu-end">

        <!-- item-->
        <a href="{{ route('lang.switch', 'id') }}" class="dropdown-item notify-item language py-2" data-lang="id"
            title="Indonesian">
            <img src="{{ URL::asset('build/images/flags/id.svg') }}" alt="user-image" class="me-2 rounded"
                height="20">
            <span class="align-middle">Indonesian</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item notify-item language py-2" data-lang="en"
            title="English">
            <img src="{{ URL::asset('build/images/flags/us.svg') }}" alt="user-image" class="me-2 rounded"
                height="20">
            <span class="align-middle">English</span>
        </a>
        {{--
        <!-- item-->
        <a href="{{ route('lang.switch', 'sp') }}" class="dropdown-item notify-item language" data-lang="sp"
            title="Spanish">
            <img src="{{ URL::asset('build/images/flags/spain.svg') }}" alt="user-image" class="me-2 rounded"
                height="20">
            <span class="align-middle">Española</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'gr') }}" class="dropdown-item notify-item language" data-lang="gr"
            title="German">
            <img src="{{ URL::asset('build/images/flags/germany.svg') }}" alt="user-image" class="me-2 rounded"
                height="20"> <span class="align-middle">Deutsche</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'it') }}" class="dropdown-item notify-item language" data-lang="it"
            title="Italian">
            <img src="{{ URL::asset('build/images/flags/italy.svg') }}" alt="user-image" class="me-2 rounded"
                height="20">
            <span class="align-middle">Italiana</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'ru') }}" class="dropdown-item notify-item language" data-lang="ru"
            title="Russian">
            <img src="{{ URL::asset('build/images/flags/russia.svg') }}" alt="user-image" class="me-2 rounded"
                height="20">
            <span class="align-middle">русский</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'ch') }}" class="dropdown-item notify-item language" data-lang="ch"
            title="Chinese">
            <img src="{{ URL::asset('build/images/flags/china.svg') }}" alt="user-image" class="me-2 rounded"
                height="20">
            <span class="align-middle">中国人</span>
        </a>

        <!-- item-->
        <a href="{{ route('lang.switch', 'fr') }}" class="dropdown-item notify-item language" data-lang="fr"
            title="French">
            <img src="{{ URL::asset('build/images/flags/french.svg') }}" alt="user-image" class="me-2 rounded"
                height="20">
            <span class="align-middle">français</span>
        </a>
        <!-- item-->
        <a href="{{ route('lang.switch', 'ae') }}" class="dropdown-item notify-item language" data-lang="ae"
            title="Arabic">
            <img src="{{ URL::asset('build/images/flags/ae.svg') }}" alt="user-image" class="me-2 rounded"
                height="18">
            <span class="align-middle">Arabic</span>
        </a> --}}
    </div>
</div>
