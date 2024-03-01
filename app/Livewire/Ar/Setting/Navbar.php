<?php

namespace App\Livewire\Ar\Setting;

use App\Models\Setting;
use Livewire\Component;

class Navbar extends Component
{
    public $team_id = NULL;

    public function mount($team_id)
    {
        $this->team_id = $team_id;
    }

    public function render()
    {
        $websiteSettingAr = Setting::where('language_id', 1)
            ->where('block', 1)
            ->where('team_id',   $this->team_id)
            ->latest()->first(); //عرض للغة العربية


        return view('livewire.ar.setting.navbar', [
            'team_id' => $this->team_id,
            'websiteSettingAr' => $websiteSettingAr
        ]);
    }
}
