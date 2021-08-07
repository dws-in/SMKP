<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportMail extends Mailable
{
  use Queueable, SerializesModels;

  public $id;
  public $email;
  public $description;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($id, $email, $description)
  {
    $this->id = $id;
    $this->email = $email;
    $this->description = $description;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->subject("TryoutRanking Support")->view('mails.support-replymail');
  }
}
