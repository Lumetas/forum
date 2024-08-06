<?php
$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);

$topic = $db->search_topics_by_id($_GET['id']);

$topic_name = $topic->name;



?>
<!DOCTYPE html>
<html lang="en">
<?php echo $head; ?>
<body>

    
    <?php echo "$header $topic_creator"; ?>
    
    <div id='messages'></div>


    <form id='send_message_form' class='send_message_form' action='/api/sendmessage.php' method='post'>
        <input name='id' type='text' value='<?php echo $_GET["id"]; ?>' style='display:none'>
        <input class='message_input' name='message' id='message_input' type='text' placeholder='message'>
        <div class='message_submit' onclick='document.getElementById("send_message_form").submit()'>&#10148;</div>

    </form>
    <script>
        let query = '<?php 
            if (isset($_GET['id'])){
                echo $_GET['id'];
            }
            else {
                header("Location: /");
            }
            ?>';
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/api/gettopicmessages.php?id=' + query);
        xhr.send();
        xhr.onload = function() {
        if (xhr.status != 200) {
            alert(`Ошибка ${xhr.status}: ${xhr.statusText}`); 
        } else {
            let search = document.getElementById('messages');
            let resp = xhr.responseText;
            let obj = JSON.parse(resp);
            let i = 0;
            let c = "<br>";
            while (i < obj.length){
                c += `<span>${obj[i].message}<br><br><br><span>${obj[i].owner}</span></span><br>`;
                i += 1;
            }
            search.innerHTML = c;
        }
        };
    </script>
</body>
</html>