@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'https://app.nativenotify.com/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
