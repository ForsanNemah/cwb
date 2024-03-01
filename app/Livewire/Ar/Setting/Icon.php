<?php

namespace App\Livewire\Ar\Setting;

use App\Models\Setting;
use Livewire\Component;

class Icon extends Component
{

    public $icon;
    public $team_id = NULL;

    public function mount($team_id)
    {
        $this->team_id = $team_id;
    }

    public function WebsiteIcon()
    {
        $setting = Setting::where('language_id', 1)
            ->where('block', 1)
            ->where('team_id',   $this->team_id)
            ->latest()->first(); //عرض للغة العربية

        return $this->icon = $setting->icon;
    }

    public function render()
    {
        $this->icon = $this->WebsiteIcon();

        return view('livewire.ar.setting.icon', [
            'team_id' => $this->team_id,
            'icon' => $this->icon

        ]);
    }
}
