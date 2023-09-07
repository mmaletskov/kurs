<?php include('incl/connect.php');?>
<?php
    session_start();
    include('incl/connect.php');
    if(isset($_SESSION['uid'])){
        $session_uid = $_SESSION['uid'];
        $sql = "SELECT * FROM users WHERE id = '$session_uid'";
        $result = $connect -> query($sql);
        $us = $result -> fetch_assoc();
        $userid = $us['id'];
    }

    if($_GET['do'] == 'exit'){
        session_unset();
        echo '<script>document.location.href="?page=enter"</script>';
    }

?>
<!DOCTYPE html>
<html lang="ru">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Josefin+Sans&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
        <title>kurs</title>
    </head>
<body>
    <?php include('incl/header.php');?>

    <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];

            if($page == 'enter'){
                include('incl/enter.php');
            }
            if($page == 'reg'){
                include('incl/reg.php');
            }
            if($page == 'tasks'){
                include('incl/tasks.php');
            }
            if($page == 'users'){
                include('incl/users.php');
            }
            if($page == 'admin'){
                include('incl/admin.php');
            }
            if($page == 'about'){
                include('incl/about.php');
            }
            if($page == 'add'){
                include('incl/add.php');
            }
            if($page == 'edit'){
                include('incl/edit.php');
            }
            if($page == 'delete'){
                include('incl/delete.php');
            }
            if($page == 'ban'){
                include('incl/ban.php');
            }
            if($page == 'razban'){
                include('incl/razban.php');
            }
            if($page == 'delete_us'){
                include('incl/delete_us.php');
            }
            if($page == 'set'){
                include('incl/set_status.php');
            }
            if($page == 'confirm'){
                include('incl/confirm_del.php');
            }
            
        }
        else{
            include('incl/main.php');
        }
    ?>

    <?php include('incl/footer.php');?>
</body>
</html>