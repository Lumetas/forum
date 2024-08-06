<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>authorization page</title>
</head>
<body>
    <form class="registration_block" action="/api/auth.php", method="post">
        <div class="page_name"><a style='color:white' href='/reg'>auth</a>/<a style='text-decoration:none;color:white' href='/reg'>reg</a></div>
        <input name="login" class="login_input" type="text" placeholder="login">
        <input name="password" class="password_input" type="text" placeholder="password">
        <div class="submit_input" onclick="document.querySelector('.registration_block').submit()" type="text">GO!</div>
    </form>
</body>
</html>