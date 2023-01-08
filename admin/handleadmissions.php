<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>
<h1 class='h1 text-success text-center my-4'>Active Admissions</h1>
<div class="container">
  <div class="row">
    <?php
    $sql = "SELECT * FROM `merohostel_admissions` WHERE `status`='active';";
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
        <li class="list-group-item">Address: '.$row['address'].'</li>
        <li class="list-group-item">Date of Admission: '.$row['dateofadmission'].'</li>
        <li class="list-group-item">Duration: '.$row['duration'].' Months</li>
        <li class="list-group-item">Sitter: '.$row['sitter'].' Sitter</li>
        <li class="list-group-item text-primary">Status: '.$row['status'].'</li>
      </ul>
      <button class="btn btn-danger" data-sn="'.$row['sn'].'" id="deleteadmission">Remove</button>
    </div>
  </div>';
}
    }else{
        echo "<h4>No Active Admissions</h4>";
    }

    ?>

  </div>
</div>




<h1 class='h1 text-danger text-center my-4'>Expired Admissions</h1>
<div class="container">
  <div class="row">
    <?php
    $sql = "SELECT * FROM `merohostel_admissions` WHERE `status`='expired';";
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
        <li class="list-group-item">Address: '.$row['address'].'</li>
        <li class="list-group-item">Date of Admission: '.$row['dateofadmission'].'</li>
        <li class="list-group-item">Duration: '.$row['duration'].' Months</li>
        <li class="list-group-item">Sitter: '.$row['sitter'].' Sitter</li>
        <li class="list-group-item text-danger">Status: '.$row['status'].'</li>
      </ul>
    </div>
  </div>';
}
    }else{
        echo "<h4>No Active Admissions</h4>";
    }

    ?>

  </div>
</div>


<script>
   $(document).on("click", "#deleteadmission", function(e) {
    swal({
            title: "Are you sure?",
            text: "You want to remove this admission!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                let sn = $(this).data("sn");
                $.ajax({
                    url: "_deleteadmission.php",
                    method: "POST",
                    data: {
                        sn:sn
                    },
                    success: function(data) {
                        if (data == "1") {
                            swal("Success! Admission Removed Successfully!", {
                                icon: "success",
                            }).then(() => {
                                window.location.assign(
                                    "/merohostel/admin/handleadmissions.php");
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