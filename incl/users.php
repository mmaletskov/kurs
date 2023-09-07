<?php
    include('incl/connect.php');
    session_start();
    if(!isset($_SESSION['uid'])){
        echo '<script>document.location.href="?page=enter"</script>';
    }
  ?>

    <?php
        if($us['level'] == 0){?>
            <div class="ban-block">
                <h2 class="ban-title">Вы были заблокированы. Все вопросы Вы можете написать администратору на почту <a class="admin-mail" href="admin@mail.ru"><span>admin@mail.ru</span></a></h2>
                <div class="btn_b">
                    <a href="?do=exit">Вернуться назад</a>
                </div>
            </div>
        <?}?>


    <?php 
    if($us['level'] == 1){?>
        <section class="user">
            <div class="container">
                <div class="user__inner">
                    <div class="user__info">
                        <div class="user__info-img">
                            <img src="<?=$us['img']?>" alt="">
                        </div>
                        <!-- модалка -->
                        <div id="openModal" class="modal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title">Редактирование профиля</h3>
                                  <a href="#close" title="Close" class="close">×</a>
                                </div>
                                <div class="modal-body">
                                <?php
                                       
                                                $sql_id = "SELECT * FROM users WHERE id = $session_uid";
                                                $result_id = $connect -> query($sql_id);
                                                $edit = $result_id -> fetch_assoc();
                                                
                                                if(isset($_POST['edit_p'])){
                                                    $name = $_POST['name'];
                                                    $email = $_POST['email'];
                                                    $file = 'img/'.time().$_FILES['photo']['name'];
                                                    if(!copy($_FILES['photo']['tmp_name'],$file)){
                                                        echo'Ошибка загрузки';
                                                    }
                                                    move_uploaded_file($_FILES['photo']['tmp_name'], $file);

                                                    $update = "UPDATE users SET
                                                                name = '$name',
                                                                email = '$email',
                                                                img = '$file'
                                                                WHERE id = $session_uid";
                                                            
                                                            $connect->query($update);
                                                            echo '<script>document.location.href="?page=users"</script>';
                                                }
                                        ?>
                                    <form method="POST" name="edit_p" class="form__form" enctype="multipart/form-data">
                                        <label for="">Загрузите Ваше фото</label>
                                        <input type="file" name="photo" id="photo">
                                        <label for="">Введите новое имя</label>
                                        <input name="name" class="edit__input" type="text" value="<?=$edit['name']?>">
                                        <label for="">Введите новую почту</label>
                                        <input name="email" class="edit__input" type="text" value="<?=$edit['email']?>">
            
                                        <input name="edit_p" class="edit__btn" type="submit" value="Отправить">
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- модалка-end -->
                        
                    </div>
                    
                    <?php
                        $sql = "SELECT * FROM users WHERE id=$session_uid";
                        $result = $connect -> query($sql);
                        $user = $result -> fetch_assoc();
                    ?>
                    <div class="user__about">
                        <h3 class="user__name"><?=$user['name']?></h3>
                        <h3 class="user__email"><?=$user['email']?></h3>
                        <?php
                            $sql_count = "SELECT COUNT(*) FROM tasks WHERE author = $session_uid";
                            $res = $connect -> query($sql_count);
                            $row = $res->fetch_row();
                            $count = $row[0];

                        ?>
                        <h3>Кол-во дел : <?=$count?></h3>
                        <div class="user-btns">
                           <div class="user-btns_work">
                            <a href="#openModal" class=""><img class="edit-link" src="./img/svg/edit-user.svg" alt=""></a>
                            <a href="?do=exit" class=""><img class="exit-link" src="./img/svg/exit-user.svg" alt=""></a>
                           </div>
                           <button class="slide-btns slide-left us-bttn"><a href="?page=tasks" class="go_tasks">Перейти к задачам</a></button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?}?>


        <?php
            if($us['level'] == 2){?>
                <section class="admin">
                <div class="container">
                <h2 class="admin-title">Мой кабинет</h2>
                    <div class="admin__inner">
                        
                        <div class="admin__info">
                            <img class="admin__info-img" src="<?=$us['img']?>" alt="">
                            <div class="admin-btns">
                                <a href="#openModal" class=""><img src="./img/svg/edit-user.svg" alt=""></a>
                                <a href="?do=exit" class=""><img src="./img/svg/exit-user.svg" alt=""></a>
                            </div>
                            <h3 class="admin__name"><?=$us['name']?></h3>
                            <h3 class="admin__email"><?=$us['email']?></h3>
                            <br>
                            <?php
                                    $sql_count = "SELECT COUNT(*) FROM tasks WHERE author = $session_uid";
                                    $res = $connect -> query($sql_count);
                                    $row = $res->fetch_row();
                                    $count = $row[0];
                                
                            ?>
                            <h3>Кол-во дел : <?=$count?></h3>
                        
                            <div class="admin__back-s">
                                <a href="?page=tasks" class="admin__back">Перейти к задачам</a>
                            </div>
                        </div>
    
                           <!-- модалка -->
                           <div id="openModal" class="modal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title">Редактирование профиля</h3>
                                  <a href="#close" title="Close" class="close">×</a>
                                </div>
                                <div class="modal-body">
                                <?php
                                       
                                                $sql_id = "SELECT * FROM users WHERE id = $session_uid";
                                                $result_id = $connect -> query($sql_id);
                                                $edit = $result_id -> fetch_assoc();
                                                
                                                if(isset($_POST['edit_p'])){
                                                    $name = $_POST['name'];
                                                    $email = $_POST['email'];
                                                    $file = 'img/'.time().$_FILES['photo']['name'];
                                                    if(!copy($_FILES['photo']['tmp_name'],$file)){
                                                        echo'Ошибка загрузки';
                                                    }
                                                    move_uploaded_file($_FILES['photo']['tmp_name'], $file);

                                                    $update = "UPDATE users SET
                                                                name = '$name',
                                                                email = '$email',
                                                                img = '$file'
                                                                WHERE id = $session_uid";
                                                            
                                                            $connect->query($update);
                                                            echo '<script>document.location.href="?page=users"</script>';
                                                }
                                        ?>
                                    <form method="POST" name="edit_p" class="form__form" enctype="multipart/form-data">
                                        <label for="">Введите новое имя</label>
                                        <input name="name" class="edit__input" type="text" value="<?=$edit['name']?>">
                                        <label for="">Введите новую почту</label>
                                        <input name="email" class="edit__input" type="text" value="<?=$edit['email']?>">
                                        <input type="file" name="photo" id="photo">
            
                                        <input name="edit_p" class="edit__btn" type="submit" value="Отправить">
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- модалка-end -->

                        

                        <div class="users__info">
                            <h3 class="user__info-title">Список пользователей</h3>

    
                            <div class="users__list">
                                <?php
                                    $sql_us = "SELECT * FROM users WHERE level < '2'";
                                    $result_us = $connect -> query($sql_us);
                                    while($list_us = $result_us -> fetch_assoc()){?>
                                        <div class="users__item">
                                            <h3 class="users__item-title"><?=$list_us['name']?></h3>
                                            <h3 class="users__item-subtitle"><?=$list_us['email']?></h3>
                                            <h3 class="users__item-subtitle">Уровень: <?=$list_us['level']?></h3>
                                            <div class="users__item-btns">
                                                <a class="users__item-btn" href="?page=ban&id=<?=$list_us['id']?>">Заблокировать</a>
                                                <a class="users__item-btn" href="?page=razban&id=<?=$list_us['id']?>">Разблокировать</a>
                                                <a class="users__item-btn" href="?page=delete_us&id=<?=$list_us['id']?>">Удалить</a>
                                            </div>
                                        </div>
                                    <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           <? }
        ?>