@component('mail::message')
# Introduction

Welcome to virtual noob {{ $user->name }}

@component('mail::button', ['url' => ''])
Dont't be noob anyomore start browsing
@endcomponent

@component('mail::table')
    | Laravel       | Table         | Example  |
    | ------------- |:-------------:| --------:|
    | Col 2 is      | Centered      | test     |
    | Col 3 is      | Right-Aligned | test     |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
