<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="editteammember">
  <div class="mb-3">
    <label for="editname" class="form-label">Name</label>
    <input type="text" class="form-control" id="editname" aria-describedby="" required autocomplete="off" readonly>
  </div>
  <div class="mb-3">
    <label for="editimagelink" class="form-label">Image Link</label>
    <input type="text" class="form-control" id="editimagelink" aria-describedby="" required autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="editrole" class="form-label">Role</label>
    <input type="text" class="form-control" id="editrole" aria-describedby="" required autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="editdescription" class="form-label">Description</label>
    <input type="text" class="form-control" id="editdescription" aria-describedby="" required autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="editprofilelink" class="form-label">Profile Link</label>
    <input type="text" class="form-control" id="editprofilelink" aria-describedby="" required autocomplete="off">
  </div>
  <button  class="btn btn-primary"><span id="editspinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container text-center mt-5 mb-2">
        <h1 class="mb-0">Team</h1><span>Meet the mero hostel team members.</span></div>
    <div class="container mt-3">
        <div class="row">

            <?php
            $sql = "SELECT * FROM merohostel_team";
    $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_assoc($result)){
        echo'<div class="col-md-3">
            <div class="bg-white p-3 text-center rounded box"><img class="img-responsive rounded-circle" src="'.$row['imagelink'].'" width="90">
                <h5 class="mt-3 name">'.$row['name'].'</h5><span class="work d-block">'.$row['role'].'</span><span class="work d-block"></span>
                <div class="mt-4 about"><span>'.$row['description'].'</span></div>
                <div class="mt-4">
                    <span class="v-profile">'.$row['profilelink'].'</span><br>
                    <button class="btn btn-outline-primary m-4 editmember">Edit Memeber</button>
                    <button data-name="'.$row['name'].'" id="deletemember" class="btn btn-outline-danger">Delete Memeber</button>
                </div>
            </div>
        </div>';
       }
       ?>
            </div>
        </div>
        <hr>
    </div>
<br><br>


<div class="container p-4">
<h1 class="h1 text-center text-primary">Add a team Member</h1><hr>
<form id="addteammember">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="" required autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="imagelink" class="form-label">Image Link</label>
    <input type="text" class="form-control" id="imagelink" aria-describedby="" required autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <input type="text" class="form-control" id="role" aria-describedby="" required autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" aria-describedby="" required autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="profilelink" class="form-label">Profile Link</label>
    <input type="text" class="form-control" id="profilelink" aria-describedby="" required autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary"><span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>Submit</button>
</form>
</div>
<script>
    $("#addteammember").submit(function(e){
        e.preventDefault();
        $("#spinner").removeClass("d-none");
        let name = $("#name").val();
        let imagelink = $("#imagelink").val();
        let role = $("#role").val();
        let description = $("#description").val();
        let profilelink = $("#profilelink").val();
        $.ajax({
            url: "_addteammember.php",
            method:"POST",
            data:{name:name,imagelink:imagelink,role:role,description:description,profilelink:profilelink},
            success: function(data){
                if (data == "1") {
                swal({
                    title: "Success!",
                    text: "Team Member Added Successfully.",
                    icon: "success",
                    button: "Okay",
                }).then(() => {
                    window.location.assign("/merohostel/admin/editmerohostelteam.php");
                });
            } else {
                $("#addteammember").trigger('reset');
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
    $(document).on("click", "#deletemember", function(e){
        e.preventDefault();
    swal({
  title: "Are you sure?",
  text: "You want to delete this team member!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    let name = $(this).data("name");
    $.ajax({
        url: "_deleteteammember.php",
        method:"POST",
        data : {name:name},
        success : function(data){
            if(data=="1"){
            swal("Success! Member Deleted Successfully!", {
      icon: "success",
    }).then(()=>{
        window.location.assign("/merohostel/admin/editmerohostelteam.php");
    })
            }else{
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
<script>
    edits = document.getElementsByClassName('editmember');
    Array.from(edits).forEach((elements) => {
      elements.addEventListener("click", (e) => {
        let div = e.target.parentNode.parentNode;
        imagelink = div.getElementsByTagName("img")[0].src;
        name = div.getElementsByTagName("h5")[0].innerText;
        role = div.getElementsByTagName("span")[0].innerText;
        description = div.querySelectorAll("div")[0].innerText;
        profilelink = div.querySelectorAll("div")[1].getElementsByTagName("span")[0].innerText;
       editname.value = name;
       editimagelink.value = imagelink;
       editrole.value = role;
       editdescription.value = description;
       editprofilelink.value = profilelink;
        $("#editModal").modal('toggle');

      })
    })
    </script>
<script>
    $("#editteammember").submit(function(e){
        e.preventDefault();
        let editname = $("#editname").val();
        let editimagelink = $("#editimagelink").val();
        let editrole = $("#editrole").val();
        let editdescription = $("#editdescription").val();
        let editprofilelink = $("#editprofilelink").val();
        $("#editspinner").removeClass("d-none");
        $.ajax({
            url: "_editteamsubmit.php",
            method:"POST",
            data:{editname:editname,editimagelink:editimagelink,editrole:editrole,editdescription:editdescription,editprofilelink:editprofilelink},
            success:function(data){
                if (data == "1") {
                    $("#editspinner").addClass("d-none");
                swal({
                    title: "Success!",
                    text: "Member Details Updated.",
                    icon: "success",
                    button: "Okay",
                }).then(() => {
                    window.location.assign("/merohostel/admin/editmerohostelteam.php");
                });
            } else {
                $("#editspinner").addClass("d-none");
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