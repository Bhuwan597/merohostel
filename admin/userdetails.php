<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>


<h1 class='h1 text-success text-center my-4'>All Users</h1>
<div class="container">
  <div class="row">
    <?php
    $sql = "SELECT * FROM `merohostel_users`;";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row= mysqli_fetch_assoc($result)){
    echo'  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="../images/'.$row['profilephoto'].'" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">'.$row['name'].'</h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Email: '.$row['email'].'</li>
        <li class="list-group-item">Phone: '.$row['phone'].'</li>
        <li class="list-group-item">Date of Birth: '.$row['dateofbirth'].'</li>
        <li class="list-group-item">Address: '.$row['address'].'</li>
        <li class="list-group-item">Admitted: '.$row['admitted'].'</li>
        <li class="list-group-item">Status: '.$row['status'].'</li>
        <li class="list-group-item">Date of signup: '.$row['dateofsignup'].'</li>
      </ul>
      <button class="btn btn-danger" data-sn="'.$row['sn'].'" id="deleteuser"> <div id="spinner" class="spinner-border spinner-border-sm me-4 d-none" role="status">
      <span class="visually-hidden"></span>
  </div>Remove</button>
    </div>
  </div>';
}
    }else{
        echo "<h4>No Users Found</h4>";
    }

    ?>

  </div>
</div>

<script>
$(document).on("click", "#deleteuser", function(e) {
    e.preventDefault();

    swal({
            title: "Are you sure?",
            text: "You want to delete this user!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $("#spinner").removeClass("d-none");
                let sn = $(this).data("sn");
                $.ajax({
                    url: "_removeuser.php",
                    method: "POST",
                    data: {
                        sn: sn
                    },
                    success: function(data) {
                        $("#spinner").addClass("d-none");
                        if (data == "1") {
                            swal("Success! User Removed Successfully!", {
                                icon: "success",
                            }).then(() => {
                                window.location.assign(
                                    "/merohostel/admin/userdetails.php");
                            })
                        } else {
                            swal("Error!", {
                                icon: "error",
                                text: "Please try again."
                            })
                        }

                    }
                })
            } else {
                swal("Process Cancelled By Admin");
            }
        });
})
</script>