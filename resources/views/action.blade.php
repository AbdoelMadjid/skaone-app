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
<div class="btn-group dropstart">
    <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
        class="btn btn-soft-info btn-sm btn-icon fs-12"><i class="ri-more-2-fill"></i></button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
        @foreach ($actions as $key => $item)
            <li><a class="dropdown-item {{ $key == 'Delete' ? 'delete' : 'action' }}"
                    href="{{ $item }}">{{ $key }}</a></li>
        @endforeach
    </ul>
</div>
