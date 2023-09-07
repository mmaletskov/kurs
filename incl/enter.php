<?php session_start();?>

<?php
    if(!isset($_SESSION['uid'])){?>
        
<?php
if(isset($_POST['enter'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_md5 = md5($pass);


    if(empty($pass)){
        $err .= 'Заполните поле с паролем <br>';
    }
    if(empty($email)){
        $err .= 'Заполните поле с почтой';
    }
    else{
        $sql = "SELECT * FROM users WHERE email ='$email'";
        $result = $connect->query($sql);
        $num = $result->num_rows;
        if($num == 0){
            $err .= 'Вы не зарегистрированы';
        }
        else{
            $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass_md5'";
            $result = $connect->query($sql);
            $num = $result->num_rows;
            if($num==0){
                $err .= 'Неверный логин или пароль';
            }
        }
    }
    if(empty($err)){
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['id'];
        echo '<script>document.location.href="?page=users"</script>';
    }
    
}

?>

    <section class="enter">
        <div class="container">
            <div class="enter__inner">
                <div class="enter__img">
                    <img src="./img/svg/iphone.svg" alt="">
                </div>
                <div class="enter__form">
                    <h3 class="enter__title">
                        Войдите в аккаунт для продолжения
                    </h3>
                    <?php echo $err;?>
                    <form method="POST" name="enter">
                        <input name="email" class="enter-input" type="text" placeholder="Введите почту">
                        <input name="pass" class="enter-input" type="password" placeholder="Введите пароль">

                        <input name="enter" class="enter-btn" type="submit" value="Войти">
                    </form>

                    <a href="?page=reg" class="quest__link">Еще не зарегистрированы? <br> Тогда пройдите регистрацию<span> здесь </span></a>
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
    <?}
        else{
            include('incl/users.php');
        }
    ?>