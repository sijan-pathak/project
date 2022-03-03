<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
</ul>
@endif

    <form method="post" action="sendemail">
        @CSRF
        <label>Enter your name</lable>
        <input type="text" name="name" /><br><br>
        <label>Enter your email</label>
        <input type="email" name="email" /><br><br>
        <label>Message</label>
        <textarea name="message"></textarea><br><br>
        <input type="submit" name="submit" value="send">
</body>
</html>