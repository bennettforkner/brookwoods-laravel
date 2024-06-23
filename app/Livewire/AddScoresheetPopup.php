<?php

namespace App\Livewire;

use App\Models\Activity;
use Livewire\Component;
use App\Models\Scoresheet;

class AddScoresheetPopup extends Component
{
    public $person;
    public $activity_id;
    public $isOpen = false;

    public function addScoresheet()
    {
        $this->validate([
            'activity_id' => 'required'
        ]);

        Scoresheet::create([
            'person_id' => $this->person->id,
            'activity_id' => $this->activity_id,
        ]);

        $this->close();
    }

    public function open()
    {
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.add-scoresheet-popup', [
            'activities' => Activity::all()->sortBy('name')
        ]);
    }
}
