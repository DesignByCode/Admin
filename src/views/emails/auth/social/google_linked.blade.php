@component('mail::message')

<h1>Hi, {{ $user->name }}</h1>
<h2>Your <strong>Google</strong> account was linked to {{ config('app.name') }}</h2>

@include('admin::emails.auth.social.partials._linked')

@component('mail::button', ['url' => config('app.url')])
VISIT WEBSITE
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
