<?php

namespace App\Jobs;

use App\Models\Contact;
use App\Models\Property;
use App\Mail\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;


class ContactMailProcess implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


  protected $contact;
  protected $property;

  /**
   * Create a new job instance.
   * @return void
   */
  public function __construct( Contact $contact, Property $property )
  {
    $this->contact = $contact;
    $this->property = $property;
  }


  /**
   * Execute the job.
   * @return void
   */
  public function handle()
  {
    Mail::send( new ContactMail( $this->contact, $this->property ) );
  }

}
