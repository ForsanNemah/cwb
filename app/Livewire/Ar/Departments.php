<?php

namespace App\Livewire\Ar;

use Livewire\Component;
use App\Models\Department;

class Departments extends Component
{
    public $team_id, $description;
    public function mount($team_id, $description)
    {
        $this->team_id = $team_id;
        $this->description = $description;
    }

    public function render()
    {

        $departments = Department::where('language_id', 1)
            ->where('team_id', $this->team_id)
            ->where('block', 1)
            ->get();

        return view('livewire.ar.departments', [
            'departments' => $departments,
            'team_id' => $this->team_id,
            'description' => $this->description

        ]);
    }
}
