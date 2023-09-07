<?php $pass = 'FEMCaMfJTYPTjNjD';?>
<?php
    $connect = new mysqli('localhost','z580','FEMCaMfJTYPTjNjD','z580');

    if($connect -> connect_errno){
        echo 'Ошибка подключения';
    }
    else{
        // echo 'Все отлично';
    }

    if($connect -> set_charset("utf-8")){
        echo 'Проблема с кодировкой';
    }
?>