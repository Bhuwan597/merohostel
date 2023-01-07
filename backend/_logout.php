<?php
if(isset($_POST['logout'])){
session_start();
session_destroy();
session_unset();
setcookie('phone',"", time() - 3600 ,'/');
setcookie('email',"", time() - 3600 ,'/');
echo true;
}else{
    header("location: /merohostel/frontend/index.php");
}


?>