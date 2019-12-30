<?php

namespace DesignByCode\Admin\Listeners\Social;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DesignByCode\Admin\Events\Social\GithubLoginEvent;
use DesignByCode\Admin\Mail\Social\GithubAccountLinked;


class SendGithubLinkEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        Log::info('github linked');
    }

    /**
     * Handle the event.
     *
     * @param  GithubLoginEvent  $event
     * @return void
     */
    public function handle(GithubLoginEvent $event)
    {
        Mail::to($event->user)->send(new GithubAccountLinked($event->user));
    }
}
