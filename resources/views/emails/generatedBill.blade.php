@component('mail::message')

# Hello {{$customer->name}},
<br>
{{$bill['total_bill']}} amount of total bills has been generated for this month.
<br>
<br>
<br>
<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

Thanks,<br>
{{ config('app.name') }}
@endcomponent
