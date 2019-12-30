@if($user->social->count() > 1)
You also have the following accounts linked with us.

@foreach($user->social as $social)
* {{ config("social.services.{$social->service}.name") }}
@endforeach
@endif
