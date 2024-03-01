<?php

namespace App\Livewire\En;

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
        $doctors = Doctor::where('language_id', 2)
            ->where('team_id', $this->team_id)
            ->get();

        return view('livewire.en.view-doctor', [
            'doctors' => $doctors,
            'team_id' => $this->team_id,
            'description' => $this->description
        ]);
    }
}
