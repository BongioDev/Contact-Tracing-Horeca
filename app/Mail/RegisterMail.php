<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    public $name;
    public $firstName;
    public $cateringName;
    public $adres;
    public $city;
    public $tel;
    public $email;
    
        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($name, $email, $firstName, $cateringName, $adres, $city, $tel)
        {
            $this->name = $name;
            $this->email = $email;
            $this->firstName = $firstName;
            $this->cateringName = $cateringName;
            $this->adres = $adres;
            $this->city = $city;
            $this->tel = $tel;
        }
    
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->markdown('layouts.register');
        }
}
