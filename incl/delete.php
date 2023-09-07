<?php
if(isset($_GET['id'])){
        if(empty($_GET['delete'])){
            $get_id = $_GET['id'];
            $delete = "DELETE FROM tasks WHERE id='$get_id'";
            $connect -> query($delete);
            echo '<script>document.location.href="?page=tasks"</script>';
        }
        else{
            echo 'Комментарий не был удален';
        }
       }
        else{
            echo'ошибка';
        }
?>