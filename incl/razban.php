<?php
    $get_id = $_GET['id'];
    $update_level = "UPDATE users SET level='1' WHERE id='$get_id' ";
    $result = $connect -> query($update_level);
    
    echo '<script>document.location.href="?page=users"</script>';
?>
