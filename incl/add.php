<?php session_start();
if(!isset($session_uid)){
    echo'<script>document.location.href="?page=enter"</script>';
}

if($us['level'] == 0){
    echo'<script>document.location.href="?page=enter"</script>';
}

?>
<?php
    if(isset($_POST['add'])){
            $name = $_POST['name'];
            $cat = $_POST['category'];
            $date = $_POST['date'];
            $author = $session_uid;
            $status = 2;

            $insert = "INSERT INTO tasks (name,category,date,author,status) VALUES ('$name','$cat','$date','$author','$status')";
            $connect->query($insert);
            echo '<script>document.location.href="?page=tasks&status=2"</script>';
    }
   
?>
        <section class="edit">
            <div class="container">
                <div class="edit-inner">
                    <div class="edit-head">
                        <a href="?page=tasks"><img src="./img/svg/arrow-back.svg" alt=""></a>
                        <h3 class="head__title">Peppo.do</h3>
                        <a href="?page=users"><img src="./img/svg/user.svg" alt=""></a>
                    </div>

                    <h3 class="edit__title">Добавление</h3>

                 
                    <div class="edit-list">
                        <h3 class="edit_title">Название</h3>

                        <form method="POST" name="add" class="edit__form">
                            <input name="name" class="input_edit" type="text" placeholder="Введите задачу">
                            <select name="category" class="select">
                                <?php
                                    $sql = "SELECT * FROM category";
                                    $result = $connect -> query($sql);
                                    while($cat = $result -> fetch_assoc()){
                                        echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
                                    }
                                ?>
                            </select>
                            <br>
                            <br>
                            <br>
                            <h3>Срок реализации</h3>
                            <br>
                            <input name="date" type="date">
                            <br>
                            <br>
                            <input class="submit-btn" type="submit" name="add" value="Отправить">
                        </form>
                    </div>

                </div>
            </div>
        </section>
   