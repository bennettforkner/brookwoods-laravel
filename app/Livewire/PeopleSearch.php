<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;

class PeopleSearch extends Component
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';

    public $search = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $people = Person::where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->paginate(20);
            
        return view('livewire.people-search', ['people' => $people]);
    }
}
