<!-- resources/views/livewire/contacts-component.blade.php -->
<div>
    @foreach ($contacts as $letter => $group)
        <div>
            <h3>{{ $letter }}</h3>
            @foreach ($group as $contact)
                <div wire:click="contactSelected({{ $contact->id }})">
                    {{ $contact->name }}
                </div>
            @endforeach
        </div>
    @endforeach
</div>
