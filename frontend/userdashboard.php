<?php require("_links.php"); session_start();?>
<?php require("../backend/dbconfig.php"); ?>
<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['phone'])){
    header("location: login.php");
    exit();
}
?>
<?php
if(isset($_SESSION['email']) && isset($_SESSION['phone'])){
    $email= $_SESSION['email'];
    $phone= $_SESSION['phone'];
    $sql = "SELECT * FROM `merohostel_users` WHERE  `email`='$email' AND `phone`='$phone';";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) ===0) {
        session_destroy();
        session_unset();
        setcookie('phone',"", time() - 3600 ,'/');
        setcookie('email',"", time() - 3600 ,'/');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
     Mero Hostel 
    </a>
    <?php
     $email= $_SESSION['email'];
     $phone= $_SESSION['phone'];
    $sql = "SELECT * FROM `merohostel_users` WHERE `email`='$email' AND `phone`='$phone';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row){
      echo ' <h3>Hello, '.$row['name'].'</h3>
      <div>
      <img style="width:70px; height:60px; border-radius:60px;" src="../images/'.$row['profilephoto'].'" alt="">';
    }
    ?>
   
<button class="btn btn-outline-primary mx-4" onclick="logout()">Logout</button>
<a href="message.php"><i class="fa fa-bell h3 me-4 text-danger" style="cursor:pointer;"></i></a>
 </div>
   

   </div>
</nav>
<!-- Navbar -->
    <div class="list-group p-4">
        <a href="#" class="list-group-item active">
            Dashboard Menus
        </a>
        <a  href="userinfo.php" class="list-group-item">Your Info</a>
        <a  href="admissions.php" class="list-group-item">Your Hostel Admissions</a>
        <a  href="changepassword.php" class="list-group-item">Change Password</a>
        <a  href="message.php" class="list-group-item">Message From Mero Hostel</a>
    </div>
</body>
<script>
  function logout(e){
    swal({
  title: "Are you sure?",
  text: "You want to logout!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:"../backend/_logout.php",
      method:"post",
      data:{logout:"logout"},
      success:function(data){
        swal("You are logged out now.", {
      icon: "success",
    }).then((value) => {
        window.location.assign("/merohostel/frontend/index.php");
});
      }
    })
   
  } else {
    swal("Your are not logged out yet.");
  }
});
  }
</script>