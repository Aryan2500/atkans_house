<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Event;
use App\Models\User;

class SendNewPasswordOnEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('New Password for ' . config('app.name') . ': ' . $this->user->name)
            ->markdown('emails.newpasswordonEmail.newPasswordOnEmail')
            ->with(['user' => $this->user, 'password' => $this->password]);
    }
}
