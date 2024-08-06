<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>error page</title>
</head>
<body style="background:url(/img/error.png);">
    <h1 style="
    color:white;
    width:100vw;
    padding:0;
    margin:0;
    position:absolute;
    left:0;
    top:0;
    height:100dvh;
    font-size:max-content;
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
    font-size:10dvh;
    text-shadow: -3px 0 black, 0 3px black, 3px 0 black, 0 -3px black;
    user-select:none;
    "><?php echo $error;?></h1>
</body>
</html>