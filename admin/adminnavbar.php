<?php
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../frontend/_links.php");?>
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
            <?php if(isset($_SESSION['adminname'])){ echo $_SESSION['adminname'];}else{echo "Admin";}?></h2>
        <button onclick="logout()" class='btn btn-outline-primary'>Logout</button>
    </div>
    <div class="list-group p-4">
        <a href="#" class="list-group-item active">
            Frontend Management
        </a>
        <a href="editnavbarmenu.php" class="list-group-item">Navbar Menu</a>
        <a href="editpricing.php" class="list-group-item">Pricing</a>
        <a href="editrecords.php" class="list-group-item">Records</a>
        <a href="editservices.php" class="list-group-item">Services</a>
        <a href="editgallery.php" class="list-group-item">Gallery</a>
        <a href="editmerohostelteam.php" class="list-group-item">Team</a>
    </div>
    <div class="list-group p-4">
        <a href="#" class="list-group-item active">
            Backend Management
        </a>
        <a href="contactusmessages.php" class="list-group-item">Contact Us Messages</a>
        <a href="handleadmissions.php" class="list-group-item">Admissions</a>
        <a href="userdetails.php" class="list-group-item">User Details</a>
    </div>
</body>
<script>
function logout() {
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
                    url: "_adminlogout.php",
                    method: "POST",
                    data: {
                        logout: "yes"
                    },
                    success: function(data) {
                        if (data == "1") {
                            swal("Success! You are logged out Now.!", {
                                icon: "success",
                            }).then(() => {
                                window.location.assign("/merohostel/admin/adminlogin.php");
                            })
                        } else {
                            swal("Logout Failed");
                        }
                    }
                })
            } else {
                swal("Logout Failed");
            }
        });
}
</script>

</html>