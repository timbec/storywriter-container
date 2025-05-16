<?php
namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Send email or save to DB here
        Mail::to('timothybenjaminbeckett@gmail.com')->send(new \App\Mail\ContactFormSubmitted($this->name, $this->email));

        session()->flash('message', 'Message sent successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

