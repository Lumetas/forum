<!DOCTYPE html>
<html lang="en">
<?php echo $head; ?>
<body>
    <?php echo "$header $topic_creator"; ?>
    <div id='search'></div>
    <script>
        let query = '<?php 
            if (isset($_GET['q'])){
                echo urlencode($_GET['q']);
            }
            else {
                header("Location: /");
            }
            ?>';
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/api/search.php?q=' + query);
        xhr.send();
        xhr.onload = function() {
        if (xhr.status != 200) {
            alert(`Ошибка ${xhr.status}: ${xhr.statusText}`); 
        } else {
            let search = document.getElementById('search');
            let resp = xhr.responseText;
            let obj = JSON.parse(resp);
            let i = 0;
            let c = "<br>";
            while (i < obj.length){
                c += `<a href='/topic?id=${obj[i].id}'>${obj[i].name}<br><br><br><span>${obj[i].owner}<span></a><br>`;
                i += 1;
            }
            search.innerHTML = c;
        }
        };
    </script>
</body>
</html>