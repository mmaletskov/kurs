<?php
    if(isset($_GET['id'])){
        $get_id = $_GET['id']; 
        $sql999="SELECT * FROM tasks WHERE id='$get_id'";
        $result999 = $connect -> query($sql999);
        $tasks = $result999 -> fetch_assoc();
        $category = $tasks['category'];
        $status = $tasks['status'];
        if(isset($_POST['edit'])){
            $name = $_POST['name'];
            $cat = $_POST['cate'];
            $date = $_POST['date'];
            $status = $_POST['stat'];

            $update = "UPDATE tasks SET
                        name = '$name',
                        category = '$cat',
                        date = '$date',
                        status = '$status'
                        WHERE id = '$get_id'";
            $connect->query($update);
            echo '<script>document.location.href="?page=tasks"</script>';
    }
    }
?>

<section class="edit">
            <div class="container">
                <div class="edit-inner">
                    <div class="edit-head">
                        <a href="?page=tasks"><img src="./img/svg/arrow-back.svg" alt=""></a>
                        <h3 class="head__title">Peppo.do</h3>
                        <a href="?page=user"><img src="./img/svg/user.svg" alt=""></a>
                    </div>

                    <h3 class="edit__title">Редактирование</h3>

                 
                    <div class="edit-list">
                        <h3 class="edit_title">Название</h3>

                        <form method="POST" name="edit" class="edit__form">
                            <input name="name" class="input_edit" type="text" value="<?=$tasks['name']?>">
                            <select name="cate" class="select">
                            <?php 
                                $query3 = "SELECT * FROM category WHERE id='$category'";
                                $result = $connect -> query($query3);
                                $categoryid = $result -> fetch_assoc();
                                echo'<option value="'.$categoryid['id'].'">'.$categoryid['name'].'</option>';
                                ?>
                                <?php
                                $sql = "SELECT * FROM category";
                                $result2 = $connect -> query($sql);
                                while($cat = $result2 -> fetch_assoc()){
                                    echo'<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
                                }
                                ?>
                            </select>
                            <br>
                            <br>
                            <h3>Срок реализации</h3>
                            <br>
                            <input name="date" type="date" value="<?=$tasks['date']?>">
                            <br>
                            <br>
                            <input class="submit-btn" type="submit" name="edit" value="Отправить">
                        </form>
                    </div>

                </div>
            </div>
        </section>


       