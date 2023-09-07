<?php
    include('incl/connect.php');
    session_start();
    if(!isset($_SESSION['uid'])){
        echo '<script>document.location.href="?page=enter"</script>';
    }
  ?>

<main class="main">
        <section class="task__list">
            <div class="container">
                <div class="task__list-inner">
                    <div class="task__list-head">
                        <a href="?"><img src="./img/svg/arrow-back.svg" alt=""></a>
                        <h3 class="head__title">Peppo.do</h3>
                        <a href="?page=users"><img src="./img/svg/user.svg" alt=""></a>
                    </div>

                    

                    <div class="task__list-input">
                        <h2 class="task__list-title">Что будем делать сегодня ?</h2>
                        <div class="tasks__btn">
                            <a href="?page=add" class=""><img class="task-img" src="./img/svg/add.svg" alt=""></a>
                        </div>
                    </div>

                    <div class="category">
                        <div class="category_item">
                    <?php
                        echo '<a class="category_link" href="?page=tasks"><span>Все категории</span></a>';
                        $cat_list_sql = "SELECT * FROM category";
                        $result3 = $connect -> query($cat_list_sql);
                        while($cat_cat = $result3 -> fetch_assoc()){
                            echo '<a class="category_link" href="?page=tasks&category='.$cat_cat['id'].'"><span>'.$cat_cat['name'].'</span></a>';
                        }

                        ?>
                        </div>
                        <hr class="category_line">
                        <div class="status_item">
                        <?php 
                        $stat_list_sql = "SELECT * FROM status";
                        $result7 = $connect -> query($stat_list_sql);
                        while($stat_stat = $result7 -> fetch_assoc()){
                            echo '<a class="status_link" href="?page=tasks&status='.$stat_stat['id'].'"><span>'.$stat_stat['name'].'</span></a>';
                        }
                        
                    ?>
                    </div>
                    
                    </div>
                    
                    <form method="POST" name="search" class="search-form">
                            <input type="search" name="text" class="search-input">
                            <input type="submit" name="search" class="search-sub" value="Найти">
                    </form>

                    <?php
                        if(isset($_POST['search'])){
                            $text = $_POST['text'];
                            // $stat_sql = "WHERE name LIKE '%".$text."%'";
                        }
                        if(isset($_GET['status'])){
                            $stat = $_GET['status'];
                            $dop_sql = "AND status = '$stat'";
                            
                        }
                        if(isset($_GET['category'])){
                            $cate = $_GET['category'];
                            if(empty($cate)){
                                $stat_sql = "";
                            }
                            else{
                                $stat_sql = "AND category = '$cate' ";
                            }   
                        }
                        else{
                            $stat_sql = "";
                        }        
                    ?>

                    <div class="to-do-list">
                        <h3 class="to-do-list_title">Список дел</h3>
                        <div class="to-do-list_list">
                        <?php
                            $sql = "SELECT * FROM tasks WHERE name LIKE '%".$text."%' $stat_sql $dop_sql ORDER BY id DESC ";
                            $result = $connect -> query($sql);
                            while($task = $result -> fetch_assoc()){?>
                                <?php
                                    if($_SESSION['uid'] == $task['author']){?>
                                        <div class="to-do-list_item">
                                        <div class="checkbox">
                                            <a href="?page=set&id=<?=$task['id']?>"><img src="./img/svg/check_circle.svg" alt=""></a>
                                            <h3 class="item-title"><?=$task['name']?></h3>
                                        </div>
                                       <div class="manage__btns">
                                            <a href="?page=edit&id=<?=$task['id']?>" class="manage__btn"><img src="./img/svg/edit.svg" alt=""></a>
                                            <a href="?page=confirm&id=<?=$task['id']?>" class="manage__btn"><img src="./img/svg/delete.svg" alt=""></a>
                                       </div>
                                    </div>
                                    <?}
                                ?>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tasks__mob">
            <div class="container">
                <div class="tasks__mob-inner">
                    <div class="tasks__mob-title">Список дел</div>

                    
                    <div class="tasks__mob-category">
                        <div class="category_item">
                    <?php
                        echo '<a class="tasks__mob-btn" href="?page=tasks"><span>Все категории</span></a>';
                        $cat_list_sql = "SELECT * FROM category";
                        $result3 = $connect -> query($cat_list_sql);
                        while($cat_cat = $result3 -> fetch_assoc()){
                            echo '<a class="tasks__mob-btn" href="?page=tasks&category='.$cat_cat['id'].'"><span>'.$cat_cat['name'].'</span></a>';
                        }?>
                        </div>
                        <div class="status_item">
                        <?php 
                        echo '<a class="tasks__mob-btn" href="?page=tasks"><span>Все статусы</span></a>';
                        $stat_list_sql = "SELECT * FROM `status`";
                        $result7 = $connect -> query($stat_list_sql);
                        while($stat_stat = $result7 -> fetch_assoc()){
                            echo '<a class="tasks__mob-btn" href="?page=tasks&status='.$stat_stat['id'].'"><span>'.$stat_stat['name'].'</span></a>';
                        }
                    ?>
                      
                    <?php
                        if(isset($_POST['search'])){
                            $text = $_POST['text'];
                        }
                        if(isset($_GET['status'])){
                            $stat = $_GET['status'];
                            $dop_sql = "AND status = '$stat'";
                        }
                        if(isset($_GET['category'])){
                            $cate = $_GET['category'];
                            if(empty($cate)){
                                $stat_sql = "";
                            }
                            else{
                                $stat_sql = "AND category = '$cate' ";
                            }
                        }
                        else{
                            $stat_sql = "";
                        }
                    ?>
                    </div>
                    </div>
                    <form method="POST" name="search" class="search-form">
                            <input type="search" name="text" class="search-input" placeholder="Поиск">
                            <input type="submit" name="search" class="search-sub" value="Найти">
                    </form>
                    <div class="to-do-list_list-mob">
                    <?php
                            $sql = "SELECT * FROM tasks WHERE name LIKE '%".$text."%' $stat_sql $dop_sql ORDER BY id DESC";
                            $result = $connect -> query($sql);
                            while($task = $result -> fetch_assoc()){?>
                                <?php
                                    if($_SESSION['uid'] == $task['author']){?>
                                       <div class="to-do-list_item-mob">
                                                <div class="checkbox">
                                                    <a href="?page=set&id=<?=$task['id']?>"><img src="./img/svg/check_circle.svg" alt=""></a>
                                                    <h3 class="item-title-mob"><?=$task['name']?></h3>
                                                </div>
                                                <div class="manage__btns-mob">
                                                    <a href="?page=tasks&id=<?=$task['id']?>#openModal-two" class="manage__btn-mob"><img src="./img/svg/edit.svg" alt=""></a>
                                                    <a href="?page=confirm&id=<?=$task['id']?>" class="manage__btn-mob"><img src="./img/svg/delete.svg" alt=""></a>
                                                </div>
                                        </div>
                                    <?}?>
                            <?}?> 
                         <!-- модалка -->
                         <div id="openModal-two" class="modal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title">Редактирование</h3>
                                  <a href="#close" title="Close" class="close">×</a>
                                </div>
                                <div class="modal-body-mob">
                                <?php  
                                       if(isset($_GET['id'])){
                                        $get_id = $_GET['id'];
                                        $sql_id = "SELECT * FROM tasks WHERE id = $get_id";
                                        $result_id = $connect -> query($sql_id);
                                        $edit = $result_id -> fetch_assoc();
                                        $category = $edit['category'];
                                        $status = $edit['status'];
                                        
                                        if(isset($_POST['edit'])){
                                            $name = $_POST['name'];
                                            $cat = $_POST['cate'];
                                            $date = $_POST['date'];
                                            $status = $_POST['status'];
                        
                                           $update = "UPDATE tasks SET
                                                        name = '$name',
                                                        category = '$cat',
                                                        date = '$date'
                                                       WHERE id = $get_id";
                                                   
                                                   $connect->query($update);
                                                   echo '<script>document.location.href="?page=tasks"</script>';
                                                }
                                            }?>
                                    <form method="POST" name="edit" class="form__form-mob">
                                        <input type="text" class="edit__input" value="<?=$edit['name']?>" name="name">
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
                                        <input class="edit__input" type="date" value="<?=$edit['date']?>" name="date">
                                        <input name="edit" class="edit__btn-mob" type="submit" value="Добавить">
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- модалка-end -->
                                    <!-- модалка -->
                                    <div id="openModal" class="modal">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h3 class="modal-title">Добавление</h3>
                                            <a href="#close" title="Close" class="close">×</a>
                                            </div>
                                            <div class="modal-body-mob">
                                            <?php
                                                if(isset($_POST['add'])){
                                                        $name = $_POST['name'];
                                                        $cat = $_POST['category'];
                                                        $date = $_POST['date'];
                                                        $author = $session_uid;
                                                        $status = 2;

                                                        $insert = "INSERT INTO tasks (name,category,date,author,status) VALUES ('$name','$cat','$date','$author','$status')";
                                                        $connect->query($insert);
                                                        echo '<script>document.location.href="?page=tasks"</script>';
                                                }?>
                                                <form method="POST" name=add class="form__form-mob">
                                                    <input name="name" class="edit__input" type="text" placeholder="Название задачи">
                                                    <select name="category" class="select">
                                                        <?php
                                                            $sql = "SELECT * FROM category";
                                                            $result = $connect -> query($sql);
                                                            while($cat = $result -> fetch_assoc()){
                                                                echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <input name="date" class="edit__input" type="date">
                                                    <input name="add" class="edit__btn-mob" type="submit" value="Отправить">
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                        <!-- модалка-end -->
                        <div class="add_task">
                            <a href="#openModal"><img class="plus__mob" src="./img/svg/plus.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
       </section>
    </main>