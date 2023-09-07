<?php
    $get_id = $_GET['id'];
    $update_level = "UPDATE users SET level='0' WHERE id='$get_id' ";
    $connect -> query($update_level);

    echo '<script>document.location.href="?page=users"</script>';
?>
