<?php
if(isset($_POST['logout'])){
session_start();
session_destroy();
session_unset();
setcookie('phone', time() - (86400 * 15), "/");
setcookie('email', time() - (86400 * 15), "/");
}else{
    header("location: /merohostel/frontend/index.php");
}


?>