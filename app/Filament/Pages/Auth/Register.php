<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Form;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Component;

use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    public function form(Form $form): Form
    {

        return $this->makeForm()
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                // $this->getRoleFormComponent(),
            ])
            ->statePath(path: 'data');
    }

    // protected function getRoleFormComponent(): Component
    // {
    //     return
    //         Hidden::make('user_type')->default(state: false)
    //         ->required();
    // }
}
