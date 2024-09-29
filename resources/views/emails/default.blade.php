<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>
@if(isset($content))

    @if(isset($content['first_name']))
        <p><b>{{ __('First name') }}</b>: {{  $content['first_name']  }}</p>
    @endif
    @if(isset($content['last_name']))
        <p><b>{{ __('Last name') }}</b>: {{  $content['last_name']  }}</p>
    @endif
    @if(isset($content['personal_phone']))
        <p><b>{{ __('Personal phone') }}</b>: {{  $content['personal_phone']  }}</p>
    @endif
    @if(isset($content['personal_email']))
        <p><b>{{ __('personal mail') }}</b>: {{  $content['personal_email']  }}</p>
    @endif
    @if(isset($content['company']))
        <p><b>{{ __('Company') }}</b>: {{  $content['company']  }}</p>
    @endif
    @if(isset($content['message']))
        <p><b>{{ __('Message') }}</b>: {{  $content['message']  }}</p>
    @endif

@endif

</body>
</html>
