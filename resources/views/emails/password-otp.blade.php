@component('mail::message')

@component('mail::message')
<h2>Hello {{ $data['to_name'] }},</h2>
	@if(isset($data['otp']))
        Your password reset OTP is {{$data['otp']}}.
	@endif
Thanks,<br>
{{ config('app.name') }}
@endcomponent