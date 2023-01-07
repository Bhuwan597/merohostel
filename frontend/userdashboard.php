<?php require("_links.php"); session_start();?>
<?php require("../backend/dbconfig.php"); ?>
<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['phone'])){
    header("location: login.php");
    exit();
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
    <div style="max-width:100vw;" class="container bg-dark d-flex justify-content-between w-100 p-4">
        <div class="container w-25"></div>
        <h2 class='text-light mx-4'>Hello,
            <?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];}else{echo "USER";}?></h2>
            <img style="width:65px; height:60px; margin-right:10px; border-radius:90px; border:2px solid white;" src="../images/<?php echo $_SESSION['profilephoto']; ?>" alt="">
        <button onclick="logout()" class='btn btn-outline-primary'>Logout</button>
    </div>
    <div class="list-group p-4">
        <a href="#" class="list-group-item active">
            Dashboard Menus
        </a>
        <a target="_main" href="userinfo.php" class="list-group-item">Your Info</a>
        <a target="_main" href="admissions.php" class="list-group-item">Your Hostel Admissions</a>
        <a target="_main" href="changepassword.php" class="list-group-item">Change Password</a>
        <a target="_main" href="notifications.php" class="list-group-item">Notifications</a>
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