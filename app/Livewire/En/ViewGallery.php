<?php

namespace App\Livewire\En;

use App\Models\Gallery;
use Livewire\Component;
use App\Models\Department;

class ViewGallery extends Component
{

    public $team_id = NULL, $description;

    public function mount($team_id, $description)
    {
        $this->team_id = $team_id;
        $this->description = $description;
    }


    public function render()
    {

        $departments = Department::where('language_id', 2)
            ->where('team_id', $this->team_id)
            ->where('block', 1)
            ->get();

        $galleries = Gallery::where('team_id', $this->team_id)
            ->where('language_id', 2)
            ->where('block', 1)
            ->get();

        return view('livewire.en.view-gallery', [
            'departments' => $departments,
            'galleries' => $galleries,
            'team_id' => $this->team_id,
            'description' => $this->description

        ]);
    }
}