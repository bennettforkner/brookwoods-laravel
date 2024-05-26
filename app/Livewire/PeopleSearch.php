<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class PeopleSearch extends Component
{
    use WithPagination;

    public $search = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $people = Person::where(DB::raw('CONCAT(first_name, \' \', last_name)'), 'like', '%' . $this->search . '%')
            ->orWhere(DB::raw('CONCAT(nickname, \' \', last_name)'), 'like', '%' . $this->search . '%')
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(20);
            
        return view('livewire.people-search', ['people' => $people]);
    }
}
