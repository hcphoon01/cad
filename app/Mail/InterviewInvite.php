<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Applicant\Applicant;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InterviewInvite extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The applicant instance.
     *
     * @var Applicant
     */
    public $applicant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.application.interview');
    }
}
