<?php

namespace App\Http\Livewire\Frontend;

use App\Models\ReviewModel;
use Livewire\Component;

class ReviewForm extends Component
{
    public $rating_cleaness = 5;
    public $rating_staff_service = 5;
    public $name = '';
    public $country = '';
    public $message = '';

    protected $rules = [
        'rating_cleaness' => 'bail|min:1|max:5',
        'rating_staff_service' => 'bail|min:1|max:5',
        'name' => 'bail|required',
        'country' => 'bail|required',
        'message' => 'bail|required',
    ];

    protected $messages = [
        'required' => 'Required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function send()
    {
        $data = $this->validate($this->rules, $this->messages);
        
        ReviewModel::where('id', '>', 0)->increment('sort');
        $data['created'] = date('Y-m-d H:i:s');
        $data['sort'] = 1;
        ReviewModel::create($data);
        
        $this->reset(['name', 'country']);
        $this->message = '';
        session()->flash('success_message', 'Send review success!');
    }

    public function render()
    {
        return view('livewire.frontend.review-form');
    }
}
