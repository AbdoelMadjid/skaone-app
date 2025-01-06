<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactsComponent extends Component
{
    public $contacts;

    public function mount()
    {
        $currentUserId = Auth::id();
        $this->contacts = User::where('id', '!=', $currentUserId)
            ->orderBy('name')
            ->get()
            ->groupBy(function ($contact) {
                return strtoupper(substr($contact->name, 0, 1));
            })
            ->map(function ($group) {
                return $group->map(function ($contact) {
                    $contact->name = ucwords(strtolower($contact->name));
                    return $contact;
                });
            });
    }

    public function contactSelected($contactId)
    {
        $this->emit('contactSelected', $contactId);
    }

    public function render()
    {
        return view('livewire.contacts-component');
    }
}
