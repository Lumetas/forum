<?php
$header = <<<OUT
<header>
<div onclick='open_or_close_theme_creator()' id='addthemebtn'>+</div>
<form id='search_form' action='/search' method='get'>
    <input name='q' type='text' placeholder='theme name'>
    <div id='startsearch' onclick='document.getElementById("search_form").submit()'><img src='./img/white-search.png'></div><br>
</form>
</header>
OUT;

$topic_creator = <<<OUT
<div id='topic_creator' style='display: none;' class='topic_creator'>
    <form id='add_topic_form' class='add_topic_form' action="/api/createtheme.php" method="post">
        <br>
        <input name="name" id="name_theme" placeholder="theme">
            <fieldset>
                <legend>who can view this topic?</legend>

                <div>
                    <input type="radio" id="huey" onchange='input_f_checkbox(false, "view1")' name="view" value="1" checked />
                    <label for="huey">everybody</label>
                </div>
                <br>
                <div>
                    <input type="radio" id="dewey" onchange='input_f_checkbox(true, "view1")' name="view" value="2" />
                    <label for="dewey">everybody except</label>
                </div>
                <br>
                <div>
                    <input type="radio" id="louie" name="view" onchange='input_f_checkbox(true, "view1")' value="3" />
                    <label for="louie">nobody except</label>
                </div>
                <br>
                <div>
                    <input type="radio" id="louie" onchange='input_f_checkbox(false, "view1")' name="view" value="4" />
                    <label for="louie">nobody</label>
                </div>
                <br>
                <input type="text" disabled id='view1' placeholder="except: bob,ann,kris" name="view1">
        </fieldset>

        <fieldset>
                <legend>who can write this topic?</legend>

                <div>
                    <input type="radio" id="huey1" name="write" onchange='input_f_checkbox(false, "write1")' value="1" checked />
                    <label for="huey">everybody</label>
                </div>
                <br>
                <div>
                    <input type="radio" id="dewey1" name="write" onchange='input_f_checkbox(true, "write1")' value="2" />
                    <label for="dewey">everybody except</label>
                </div>
                <br>
                <div>
                    <input type="radio" id="louie1" name="write" onchange='input_f_checkbox(true, "write1")' value="3" />
                    <label for="louie">nobody except</label>
                </div>
                <br>
                <div>
                    <input type="radio" id="louie1" name="write" onchange='input_f_checkbox(false, "write1")' value="4" />
                    <label for="louie">nobody</label>
                </div>
                <br>
                <input type="text" disabled id='write1' placeholder="except: bob,ann,kris" name="write1">
        </fieldset><br>
        <div onclick='document.getElementById("add_topic_form").submit()'>save</div><br>
    </form>
    </div>
OUT;


$head = <<<OUT
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <script src='/js/main.js'></script>
    <title>lumetas forum</title>
</head>
OUT;