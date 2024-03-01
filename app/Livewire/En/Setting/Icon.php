<?php

namespace App\Livewire\En\Setting;

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
        $setting = Setting::where('language_id', 2)
            ->where('block', 1)
            ->where('team_id',   $this->team_id)
            ->latest()->first(); //عرض للغةenglish

        return $this->icon = $setting->icon;
    }

    public function render()
    {
        $this->icon = $this->WebsiteIcon();
        return view('livewire.en.setting.icon', [
            'team_id' => $this->team_id,
            'icon' => $this->icon
        ]);
    }
}
