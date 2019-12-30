<?php

namespace DesignByCode\Admin\Mail\Social;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use DesignByCode\Admin\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GoogleAccountLinked extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Google account linked')
            ->markdown('admin::emails.auth.social.google_linked');
    }
}
