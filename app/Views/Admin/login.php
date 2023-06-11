<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login with your account</h1>
    <?=form_open()?>
        <label for="EMAIL">Enter your email</label>
        <input type="text" name="EMAIL" id="">
        <label for="PASSWORD">Enter your password</label>
        <input type="password" name="PASSWORD" id="">
        <button type="submit">Sign in</button>
    <?=form_close()?>
</body>
</html>