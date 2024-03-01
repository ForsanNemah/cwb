<?php

namespace App\Livewire\Ar;

use App\Models\Branch;
use App\Models\Doctor;
use Livewire\Component;
use App\Models\Department;
use App\Models\Appointment;

class Booking extends Component
{
    public $name, $email, $phone, $booking_date, $message, $department_id, $doctor_id, $branch_id;

    public $team_id, $description;

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
            'phone' => ['required'],
            'booking_date' => ['required'],
            'message' => ['required', 'string'],
            'doctor_id' => 'required',
            'department_id' => 'required',
            'branch_id' => 'required',

        ];
    }


    public function resetInput()
    {
        $this->name = NULL;
        $this->email = NULL;
        $this->phone = NULL;
        $this->booking_date = NULL;
        $this->message = NULL;
        $this->doctor_id = NULL;
        $this->department_id = NULL;
        $this->branch_id = NULL;
    }

    public function Save()
    {

        $validatedData = $this->validate();
        $booking =  Appointment::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'booking_date' => $this->booking_date,
            'message' => $this->message,
            'doctor_id' => $this->doctor_id,
            'department_id' => $this->department_id,
            'branch_id' => $this->branch_id,
            'team_id' => $this->team_id,
        ]);

        session()->flash('message', 'تم  الحجز بنجاح');
        $this->resetInput();
    }



    public function render()
    {

        $doctors = Doctor::where('language_id', 1)
            ->where('team_id', $this->team_id)
            ->get();
        $departments = Department::where('language_id', 1)
            ->where('team_id', $this->team_id)
            ->where('block', 1)
            ->get();

        $branches = Branch::where('language_id', 1)
            ->where('team_id', $this->team_id)
            ->where('block', 1)
            ->get();

        return view('livewire.ar.booking', [
            'doctors' => $doctors,
            'departments' => $departments,
            'branches' => $branches,
            'team_id' => $this->team_id,
            'description' => $this->description

        ]);
    }
}
