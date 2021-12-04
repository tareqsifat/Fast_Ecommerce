<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
</head>

<body>
    <strong>Subject: </strong><span>{{ ucfirst($data['subject'])}}</span> <br>
    <strong>Message: </strong>
    <span>{{ ucfirst($data['message'])}}</span>
    <span><a href="{{route('post.otp')}}">click hear</a> to visit your <a href="{{route('home')}}">{{config('app.name')}}</a> account
    </span><br>
</body>

</html>