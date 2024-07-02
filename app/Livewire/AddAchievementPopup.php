<?php

namespace App\Livewire;

use App\Models\Achievement;
use App\Models\Award;
use Livewire\Component;

class AddAchievementPopup extends Component
{
    public $scoresheet;
    public $award;
    public $dateAchieved;
    public $points;
    public $isOpen = false;

    public function addAchievement()
    {
        $this->validate([
            'scoresheet' => 'required',
            'award' => 'required',
            'dateAchieved' => 'required',
            'points' => ($this->award->has_points ? 'required' : 'sometimes')
        ]);

        Achievement::create([
            'scoresheet_id' => $this->scoresheet->id,
            'award_id' => $this->award->id,
            'date' => $this->dateAchieved,
            'points' => $this->points,
        ]);

        $this->close();
    }

    public function deleteAchievement($achievementId)
    {
        Achievement::find($achievementId)->delete();
        return redirect(request()->header('Referer'));
    }

    public function open()
    {
        $this->dateAchieved = $this->dateAchieved ?? now()->format('Y-m-d');
        $this->points = $this->points ?? $this->award->points;
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.add-achievement-popup');
    }
}
