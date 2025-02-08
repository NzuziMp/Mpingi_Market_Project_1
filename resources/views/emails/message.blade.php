<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>
<body>
    <p><span style="font-weight:bolder">From:</span> {{ $data['email'] }}</p>
    <p><span style="font-weight:bolder">Hi there,<br/><br/>Forgot your password?<br/><br/>To reset your password, click a link below:<br/><b><a href="http://127.0.0.1:8000/update-password?reset={{ $data['code'] }}"> mpingimarket Password Reset Link</a></b><br/><br/>Otherwise, if you did not make this request then please ignore this email.</p><br>
</body>
</html>
