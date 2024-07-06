<?php

namespace App\Livewire;

use App\Models\Session;
use Livewire\Component;

class ActivityAwardsHistoryPopup extends Component
{
    public $activity;
    public $startDate;
    public $endDate;
    public $isOpen = false;

    public function launchReport()
    {
        $this->validate([
            'startDate' => 'required',
            'endDate' => 'required',
            'activity' => 'required',
        ]);

        $this->close();
        return redirect()->route('pdfs.activity-achievements-list', [
            'activity_id' => $this->activity->id,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);
    }

    public function open()
    {
        $currentSession = Session::whereRaw('CURRENT_TIMESTAMP BETWEEN start_at AND end_at')->first();
        $this->startDate = $currentSession->start_at->format('Y-m-d') ?? now()->format('Y-m-d');
        $this->endDate = $currentSession->end_at->format('Y-m-d') ?? now()->format('Y-m-d');
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.activity-awards-history-popup');
    }
}
