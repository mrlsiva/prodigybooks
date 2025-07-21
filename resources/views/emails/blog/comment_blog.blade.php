
<div class="mail_container">
<style>
.button-706ACA {
	font-family: Avenir,Helvetica,sans-serif;
    box-sizing: border-box;
    border-radius: 3px;
    color: #fff;
    display: inline-block;
    text-decoration: none;
    background-color: #706ACA;
    border-top: 10px solid #706ACA;
    border-right: 18px solid #706ACA;
    border-bottom: 10px solid #706ACA;
    border-left: 18px solid #706ACA;
}
</style>

@component('mail::message')
<h2>Hello {{ $data['to_name'] }},</h2>
	@if(isset($data['comment']))
			{{$data['created_by']}} Given Comment is  {{$data['comment']}}.
	@endif
	 @if(isset($data['email_type']))
            @if($data['email_type'] == 'bulk_user_upload')
             New Account Created,Please login using your Emailid and your Password is  0101.
				Username:YourEmailId,
				Password:0101
            @endif
             @if($data['email_type'] == 'singleofflineuser')
             New Offlline User
            @endif
	@endif
Thanks

@endcomponent

</div>