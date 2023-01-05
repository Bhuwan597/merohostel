<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>
<div class="row">
    <h1 class="text-center text-danger">Main Images</h1><hr>
    <?php
        $sql = "SELECT * FROM merohostel_gallery";
    $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'<div class="col-md-4"><div class="card m-4" style="width: 18rem;">
    <img src="'.$row['mainimagelink'].'" class="card-img-top" alt="...">
    <div class="card-body">
      <button id="deleteimage" class="btn btn-outline-danger" data-mainimagelink="'.$row['mainimagelink'].'">Delete this image</button>
    </div>
  </div></div>';
   }
   ?>

</div>

<div class="row">
    <h1 class="text-center text-danger">Sub Images</h1><hr>
    <?php
        $sql = "SELECT * FROM merohostel_gallery";
    $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'<div class="col-md-4"><div class="card m-4" style="width: 18rem;">
    <img src="'.$row['subimagelink'].'" class="card-img-top" alt="...">
    <div class="card-body">
    </div>
  </div></div>';
   }
   ?>
</div>

<div id="addimagelinks" class="container p-4">

    <form>
        <div class="mb-3">
            <label for="mainimagelink" class="form-label">Main Image Link</label>
            <input type="text" class="form-control" id="mainimagelink" aria-describedby="emailHelp" required
                autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="subimagelink" class="form-label">Sub Image Link</label>
            <input type="text" class="form-control" id="subimagelink" aria-describedby="emailHelp" required
                autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary"> <span id="spinner"
                class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>Submit</button>
    </form>
</div>

<script>
$("#addimagelinks").submit(function(e) {
    e.preventDefault();
    $("#spinner").removeClass("d-none");
    let mainimagelink = $("#mainimagelink").val();
    let subimagelink = $("#subimagelink").val();
    $.ajax({
        url: "_addimagelinks.php",
        method: "POST",
        data: {
            mainimagelink: mainimagelink,
            subimagelink: subimagelink
        },
        success: function(data) {
            if (data == "1") {
                swal({
                    title: "Success!",
                    text: "Image Added to the Gallery",
                    icon: "success",
                    button: "Okay",
                }).then(() => {
                    window.location.assign("/merohostel/admin/editgallery.php");
                });
            } else {
                $("#addimagelinks").trigger('reset');
                $("#spinner").addClass("d-none");
                swal({
                    title: "Error!",
                    text: "Please try again",
                    icon: "error",
                    button: "Okay",
                });
            }
        }
    })
})
</script>













<script>
$(document).on("click", "#deleteimage", function(e) {
    e.preventDefault();
    swal({
            title: "Are you sure?",
            text: "You want to delete this image and its correspondence!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                let mainimagelink = $(this).data("mainimagelink");
                $.ajax({
                    url: "_deleteimage.php",
                    method: "POST",
                    data: {
                        mainimagelink: mainimagelink
                    },
                    success: function(data) {
                        if (data == "1") {
                            swal("Success! Image Deleted Successfully!", {
                                icon: "success",
                            }).then(() => {
                                window.location.assign(
                                    "/merohostel/admin/editgallery.php");
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