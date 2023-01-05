<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    echo false;
    exit();
}
?>
<?php
if(isset($_POST['logout'])){
session_unset();
session_destroy();
echo true;
}else{
    echo false;
}

?>