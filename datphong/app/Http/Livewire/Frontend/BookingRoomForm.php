<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class BookingRoomForm extends Component
{
    public $room;
    public $arrive_date = '';
    public $departure_date = '';
    public $number_of_person = 3;

    protected $rules = [
        'arrive_date' => 'bail|required',
        'departure_date' => 'bail|required',
        'number_of_person' => 'bail|required|min:1|max:4',
    ];

    protected $messages = [
        'required' => 'Required',
    ];

    // public function updated($field)
    // {
    //     $this->validateOnly($field, $this->rules, $this->messages);
    // }

    public function mount($room)
    {
        $this->room = $room;
    }

    public function booking()
    {
        $data = $this->validate($this->rules, $this->messages);
        $data['room_id'] = $this->room->id;
        session(['booking' => $data]);
        return redirect()->to(route('index.booking'));
    }

    public function render()
    {
        return view('livewire.frontend.booking-room-form');
    }
}
