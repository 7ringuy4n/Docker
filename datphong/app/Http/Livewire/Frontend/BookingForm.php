<?php

namespace App\Http\Livewire\Frontend;

use App\Mail\MailService;
use App\Models\BookingModel;
use App\Models\EmailBccModel;
use App\Models\EmailTemplateModel;
use App\Models\RoomModel;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BookingForm extends Component
{
    public $fullname = '';
    public $phone = '';
    public $email = '';
    public $nationality = '';
    public $arrive_date = '';
    public $departure_date = '';
    public $number_of_person = null;
    public $note = '';
    public $room;
    public $locale;

    protected $rules = [
        'fullname' => 'bail|required',
        'phone' => 'bail|required',
        'email' => 'bail|required|email',
        'arrive_date' => 'bail|required',
        'departure_date' => 'bail|required',
        'number_of_person' => 'bail|required',
    ];

    protected $messages = [
        'required' => 'Required',
        'email' => 'Email Invalid'
    ];

    public function mount($booking)
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
        $this->arrive_date = $booking['arrive_date'];
        $this->departure_date = $booking['departure_date'];
        $this->number_of_person = $booking['number_of_person'];
        $this->room = RoomModel::find($booking['room_id']);
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
    }

    public function send()
    {
        // $this->reset();
        $data = $this->validate($this->rules, $this->messages);
        $data['room_id'] = $this->room->id;
        $data['created'] = date('Y-m-d H:i:s');
        $data['room_name'] = $this->room->name;
        $data['note'] = $this->note;
        $data['nationality'] = $this->nationality;

        /* Send mail */
        $mailService = new MailService();

        // Get content send mail
        $templateItem = EmailTemplateModel::where(['name' => 'EMAIL_TEMPLATE_BOOKING'])->first();
        $title = $mailService->setDataTemplate($templateItem->title, [
            'name' => $data['fullname'],
        ]);
        $content = $mailService->setDataTemplate($templateItem->content, $data);

        $emailBccModel = new EmailBccModel();
        $bccItems = $emailBccModel->getItem(['templateId' => $templateItem->id], ['task' => 'by-template']);
        $bcc = [];
        foreach ($bccItems as $item)
            $bcc[] = $item->email;

        $mailService->sendEmail($data['email'], $title, $content, $bcc);
        $data['arrive_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $this->arrive_date)));
        $data['departure_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $this->departure_date)));
        BookingModel::create($data);
        return redirect()->to(route('index.booking.success'));
    }

    public function render()
    {
        return view('livewire.frontend.booking-form');
    }
}
