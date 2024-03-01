<?php

namespace App\Livewire\Ar;

use App\Models\Doctor;
use Livewire\Component;

class ViewDoctor extends Component
{
    public $team_id = NULL, $description;

    public function mount($team_id, $description)
    {
        $this->team_id = $team_id;
        $this->description = $description;
    }


    public function render()
    {
        $doctors = Doctor::where('language_id', 1)
            ->where('team_id', $this->team_id)
            ->get();

        return view('livewire.ar.view-doctor', [
            'doctors' => $doctors,
            'team_id' => $this->team_id,
            'description' => $this->description
        ]);
    }
}
