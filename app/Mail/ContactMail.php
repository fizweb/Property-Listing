<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class ContactMail extends Mailable
{
  use Queueable, SerializesModels;


  protected $contact;
  protected $property;


  /**
   * Create a new message instance.
   * @return void
   */
  public function __construct( Contact $contact, Property $property )
  {
    $this->contact  = $contact;
    $this->property = $property;
  }


  /**
   * Build the message.
   * @return $this
   */
  public function build()
  {
    return $this->view('emails.contact-mail', [
      'contact'  => $this->contact,
      'property' => $this->property

    ])->to($this->contact->email)
      ->from('support@property.com');

  }

}
