{{-- <div class="btn-group dropstart">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Action
    </button>
    <ul class="dropdown-menu">
        @foreach ($actions as $key => $item)
            <li><a class="dropdown-item {{ $key == 'Delete' ? 'delete' : 'action' }}"
                    href="{{ $item }}">{{ $key }}</a></li>
        @endforeach
    </ul>
</div> --}}
{{-- <div class="btn-group dropstart">
    <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
        class="btn btn-soft-primary btn-md btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
        @foreach ($actions as $key => $item)
            <li><a class="dropdown-item {{ $key == 'Delete' ? 'delete' : 'action' }}"
                    href="{{ $item }}">{{ $key }}</a></li>
        @endforeach
    </ul>
</div> --}}
@if (count($actions) === 1)
    @foreach ($actions as $key => $item)
        <a href="{{ $item }}"
            class="btn btn-sm {{ $key === 'Delete' ? 'btn-soft-danger delete' : 'btn-soft-primary action' }}">
            <i
                class="ri-{{ $key === 'Delete' ? 'delete-bin-6-line' : ($key === 'Edit' ? 'edit-2-line' : 'eye-line') }} fs-16"></i>
        </a>
    @endforeach
@else
    <div class="btn-group dropstart">
        <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
            class="btn btn-soft-primary btn-md btn-icon fs-14">
            <i class="ri-more-2-fill"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
            @foreach ($actions as $key => $item)
                <li>
                    <a class="dropdown-item {{ $key == 'Delete' ? 'delete' : 'action' }}" href="{{ $item }}">
                        {{ $key }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
