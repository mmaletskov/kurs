<?php
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM tasks WHERE id = $get_id";
        $result = $connect -> query($sql);
        $task_del = $result -> fetch_assoc();
    }
?>
<h2 class="confirm_title">Вы уверены, что хотите удалить данную запись</h2>
<div class="confirm__btns">
    <a href="?page=delete&id=<?=$task_del['id']?>" class="confirm__btn">Да</a>
    <a href="?page=tasks&status=2" class="confirm__btn">Нет</a>
</div>