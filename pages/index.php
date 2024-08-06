<!DOCTYPE html>
<html lang="en">
<?php echo $head; ?>
<body>
    <?php if (!isset($_COOKIE["session"]) || $db->search_user_data_with_session($_COOKIE['username'], $_COOKIE['session']) == NULL){
        //echo $_COOKIE["session"]; if (){
        header("Location: /reg");
    }
    else {
        
    }
    ?>

    <?php echo "$header $topic_creator";?>
    
</body>
</html>