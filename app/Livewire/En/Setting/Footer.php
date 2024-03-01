<?php

namespace App\Livewire\En\Setting;

use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{

    public $team_id = NULL;

    public function mount($team_id)
    {
        $this->team_id = $team_id;
    }

    public function render()
    {
        $websiteSettingEn = Setting::where('language_id', 2)
            ->where('block', 1)
            ->where('team_id',   $this->team_id)
            ->latest()->first(); //عرض للغة العربية

        return view('livewire.en.setting.footer', [
            'websiteSettingEn' => $websiteSettingEn,
            'team_id' => $this->team_id,
        ]);
    }
}
