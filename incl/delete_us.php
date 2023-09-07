<?php
if(isset($_GET['id'])){
        if(empty($_GET['delete_us'])){
            $get_id = $_GET['id'];
            $delete = "DELETE FROM users WHERE id=$get_id";
            $connect -> query($delete);
            echo '<script>document.location.href="?page=users"</script>';
        }
        else{
            echo 'Пользователь не был удален';
        }
       }
        else{
            echo'ошибка';
        }
?>