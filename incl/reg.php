<?php
    if(isset($_POST['reg'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass'];
        $pass_md5 = md5($pass);
        $level = 1;
        $file = 'img/'.time().$_FILES['photo']['name'];
        if(!copy($_FILES['photo']['tmp_name'],$file)){
            echo'Ошибка загрузки';
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], $file);


    // проверка на пустоту
    if(empty($name)){
        $err .= 'Заполните поле с именем!<br>';
    }
    if(empty($email)){
        $err .= 'Заполните поле с почтой<br>';
    }
    if(empty($pass)){
        $err .= 'Заполните поле с паролем<br>';
    }


    $how = iconv_strlen($pass);
    if($how <= 8){
        $err .= 'Количество символов в пароле не должно быть меньше 8<br>';
    }
    if($how >= 15){
        $err .= 'Количество символов в пароле не должно превышать 15 символов<br>';
    }

    
    // проверка формата почты
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $err .= 'неверный формат почты<br>';
    }

    if($pass != $re_pass){
        $err .= 'Пароли не совпадают<br>';
    }

    if(empty($err)){
        $insert_sql = "INSERT INTO users (name,email,pass,level,img)
         VALUES ('$name','$email','$pass_md5','$level','$file')";
        $connect -> query($insert_sql);
        echo '<script>document.location.href="?page=enter"</script>';
    }
}
?>

   <main class="main">
    <section class="registration ">
        <div class="container">
            <div class="registration__inner">
                <div class="registration__img">
                    <img src="./img/svg/iphone.svg" alt="">
                </div>
                <div class="registration__form">
                    <h3 class="registration__title">
                        Пройдите регистрацию и начните наводить порядок в Вашей жизни
                    </h3>
                    <?php echo $err; ?>
            
                    <form method="POST" name="reg" enctype="multipart/form-data">
                        <input name="name" class="reg-input" type="text" placeholder="Введите имя" value="<?=$us['name']?>">
                        <input name="email" class="reg-input" type="text" placeholder="Введите почту">
                        <input name="pass" class="reg-input" type="password" placeholder="Придумайте пароль">
                        <input name="re_pass" class="reg-input" type="password" placeholder="Повторите пароль">
                        <input type="file" name="photo" id="photo">

                        <input class="reg-btn" type="submit" name="reg" value="Отправить">
                    </form>

                </div>
            </div>
        </div>
    </section>


   
    <section class="motivation">
        <div class="container">
            <div class="motivation__inner">
                <h2 class="motivation__title">Начинайте день, чувствуя покой и контроль над ситуацией</h2>
                <h3 class="motivation__subtitle">Получайте ясное представление обо всем, что нужно сделать, и не упускайте из вида важные задачи.</h3>

                <div class="motivation__citaty">
                    <p class="motivation__text">
                        “Не забывайте: в основе каждого провала лежат действия без плана.”
                    </p>
                    <h4 class="motivation__subtext">Брайн Трейси</h4>
                </div>
            </div>
        </div>
    </section>
    </main>