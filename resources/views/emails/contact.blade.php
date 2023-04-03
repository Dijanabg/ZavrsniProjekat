@component('mail::message')
    # Contact from {{ $name }}

    {{ $message }}

    @component('mail::button', ['url' => 'http://hellshop/'])
        Visit us
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent