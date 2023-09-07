<?php
session_start();
?>

<?php
 if(isset($_GET['id'])){
    $stat_id = $_GET['id'];
    $sql = "UPDATE tasks SET status = '1' WHERE id = '$stat_id'";
    $qs = $connect -> query($sql);
    // var_dump($qs);
    echo '<script>document.location.href="?page=tasks&status=2"</script>';
}
else{
    echo 'err';
}
?>