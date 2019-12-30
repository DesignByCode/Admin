<?php

namespace DesignByCode\Admin\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use DesignByCode\Admin\Events\Social\GithubLoginEvent;
use DesignByCode\Admin\Events\Social\GoogleLoginEvent;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use DesignByCode\Admin\Listeners\Social\SendGithubLinkEmailListener;
use DesignByCode\Admin\Listeners\Social\SendGoogleLinkEmailListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class AdminSocialServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        GithubLoginEvent::class => [
            SendGithubLinkEmailListener::class,
        ],
        GoogleLoginEvent::class => [
            SendGoogleLinkEmailListener::class,
        ],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
