<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>
<div class="container-fluid rounded p-4">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Service Title</th>
                <th scope="col">Service Description</th>
                <th scope="col">Service Icon</th>
                <th scope="col">Service Button Value</th>
                <th scope="col">Service Button Color</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $sql = "SELECT * FROM merohostel_services";
    $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'<tr>
    <td>'.$row['servicetitle'].'</td>
    <td>'.$row['servicedescription'].'</td>
    <td><i class=" '.$row['serviceicon'].'"></i></td>
    <td> '.$row['servicebuttonvalue'].'</td>
    <td><button class=" '.$row['servicebuttoncolor'].'">Button to appear</button></td>
    <td><button id="deleteservice" data-servicetitle="'.$row['servicetitle'].'" type="submit" class="btn btn-outline-danger">Delete Menu</button> </td>
</tr>';}
    ?>       
        </tbody>
</table>
    </div>

    <div class="container">
    <form id="editservices" method="POST">
    <div class="mb-3">
        <label for="servicetitle" class="form-label">Service Title</label>
        <input name="servicetitle" type="text" class="form-control" id="servicetitle" aria-describedby="" required autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="servicedescription" class="form-label">Service Description</label>
        <input name="servicedescription" type="text" class="form-control" id="servicedescription" aria-describedby="" required autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="serviceicon" class="form-label">Service Icon</label>
        <input name="serviceicon" type="text" class="form-control" id="serviceicon" aria-describedby="" required autocomplete="off">
    </div>
      
    <div class="mb-3">
        <label for="servicebuttonvalue" class="form-label">Service Button Value</label>
        <input name="servicebuttonvalue" type="text" class="form-control" id="servicebuttonvalue" aria-describedby="" required autocomplete="off">
    </div>
      
    <div class="mb-3">
        <label for="servicebuttoncolor" class="form-label">Service Button Color</label>
        <input name="servicebuttoncolor" type="text" class="form-control" id="servicebuttoncolor" aria-describedby="" required autocomplete="off">
    </div>
      
<button type="submit" class="btn btn-primary">  <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
Submit</button>
</form>
</div>
<script>
    $("#editservices").submit(function(e) {
        e.preventDefault();
        $("#spinner").removeClass("d-none");
var servicetitle = $("#servicetitle").val();
var servicedescription = $("#servicedescription").val();
var serviceicon = $("#serviceicon").val();
var servicebuttonvalue = $("#servicebuttonvalue").val();
var servicebuttoncolor = $("#servicebuttoncolor").val();
console.log(servicetitle,servicedescription,serviceicon,servicebuttonvalue,servicebuttoncolor)
$.ajax({
    url:"_editservices.php",
    method:"post",
    data: {servicetitle:servicetitle,servicedescription:servicedescription,serviceicon:serviceicon,servicebuttonvalue:servicebuttonvalue,servicebuttoncolor:servicebuttoncolor},
    success: function(data){
        if(data =="1"){
            swal({
  title: "Success!",
  text: 'Service Added Successfully.',
  icon: "success",
  button: "Okay",
}).then(()=>{
        window.location.assign("/merohostel/admin/editservices.php");
    });
        }else{
            $("#spinner").addClass("d-none");
            swal({
  title: "Error!",
  text: 'Please try again.',
  icon: "error",
  button: "Okay",
});
        }
       
$("#editservices").trigger("reset");
    }
})
    })
</script>
<script>
    $(document).on("click", "#deleteservice", function(e){
        e.preventDefault();
    swal({
  title: "Are you sure?",
  text: "You want to delete this menu!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    let servicetitle = $(this).data("servicetitle");
    $.ajax({
        url: "_deleteservices.php",
        method:"POST",
        data : {servicetitle:servicetitle},
        success : function(data){
            if(data=="1"){
            swal("Success! Service Deleted Successfully!", {
      icon: "success",
    }).then(()=>{
        window.location.assign("/merohostel/admin/editservices.php");
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