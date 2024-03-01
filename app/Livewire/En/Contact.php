<?php

namespace App\Livewire\En;

use Livewire\Component;
use App\Models\ContactUs;

class Contact extends Component
{


    public $team_id = NULL, $description;
    public $name, $email, $phone, $subject, $message;


    public function mount($team_id, $description)
    {
        $this->team_id = $team_id;
        $this->description = $description;
    }

    //خاصةب القواعد لتعبئة الجداول
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'integer'],
            'message' => ['required', 'string'],
            'subject' => ['required', 'string'],
        ];
    }

    public function Request()
    {

        $this->validate();
        $contact =  ContactUs::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'team_id' => $this->team_id,

        ]);

        return $contact;
    }


    public function resetInput()
    {
        $this->name = NULL;
        $this->email = NULL;
        $this->phone = NULL;
        $this->subject = NULL;
        $this->message = NULL;
    }

    public function Save()
    {
        $save = $this->Request();

        session()->flash('message', 'Your Message was sent Successfully');
        $this->resetInput();
    }



    public function render()
    {
        return view('livewire.en.contact', [
            'team_id' => $this->team_id,
            'description' => $this->description
        ]);
    }
}
