@component('mail::message')
# Welcome {{ $user->name }}

Welcome to {{ config('app.name') }}.

Together, we will bring the next level in **Martial Arts Championships**.

@component('mail::button', ['url' => route('admin.home')])
Access Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
