<?php

namespace App\Http\Livewire\Frontend;

use App\Mail\MailService;
use App\Models\ContactModel;
use App\Models\EmailBccModel;
use App\Models\EmailTemplateModel;
use Livewire\Component;

class Contact extends Component
{
    public $fullname = '';
    public $phone = '';
    public $email = '';
    public $arrive_date = '';
    public $departure_date = '';
    public $number_of_person = null;
    public $question = '';

    protected $rules = [
        'fullname' => 'bail|required',
        'phone' => 'bail|required',
        'email' => 'bail|required',
        'question' => 'bail|required',
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
        // $this->reset();
        $data['created'] = date('Y-m-d H:i:s');

        /* Send mail */
        $mailService = new MailService();

        // Get content send mail
        $templateItem = EmailTemplateModel::where(['name' => 'EMAIL_TEMPLATE_SEND_CONTACT'])->first();
        $title = $mailService->setDataTemplate($templateItem->title, [
            'name' => $data['fullname'],
        ]);
        $content = $mailService->setDataTemplate($templateItem->content, $data);
        
        // Get email bcc contact
        $emailBccModel = new EmailBccModel();
        $bccItems = $emailBccModel->getItem(['templateId' => $templateItem->id], ['task' => 'by-template']);
        $bcc = [];
        foreach ($bccItems as $item)
            $bcc[] = $item->email;

        $mailService->sendEmail($data['email'], $title, $content, $bcc);
        ContactModel::create($data);
        session()->flash('success_message', 'Cảm ơn bạn đã gửi thông tin liên hệ. Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất.');
    }

    public function render()
    {
        return view('livewire.frontend.contact');
    }
}
