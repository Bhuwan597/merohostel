<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>
<div class="container-fluid rounded p-4">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Menu</th>
                <th scope="col">Icon</th>
                <th scope="col">Link</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $sql = "SELECT * FROM merohostel_navbar";
    $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'<tr>
    <td>'.$row['menu'].'</td>
    <td><i class="'.$row['icon'].'"></td>
    <td> '.$row['link'].'</td>
    <td><button id="deletenavbarmenu" data-menu="'.$row['menu'].'" type="submit" class="btn btn-outline-danger">Delete Menu</button> </td>
</tr>';}
    ?>       
        </tbody>
</table>
    </div>
    <div class="container">

        <form id="editnavbarmenu" method="POST">
            <div class="mb-3">
                <label for="menu" class="form-label">Menu</label>
                <input name="menu" type="text" class="form-control" id="menu" aria-describedby="" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="icon" class="form-label">Icon Class</label>
                <input name="icon" type="text" class="form-control" id="icon" aria-describedby="" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input name="link" type="text" class="form-control" id="link" aria-describedby="" required autocomplete="off">
            </div>     
<button type="submit" class="btn btn-primary">  <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
    Submit</button>
</form>
</div>
<script>
    $("#editnavbarmenu").submit(function(e) {
        e.preventDefault();
        $("#spinner").removeClass("d-none");
var menu = $("#menu").val();
var icon = $("#icon").val();
var link = $("#link").val();
let mydata = new FormData(this);
$.ajax({
    url:"_editnavbarmenu.php",
    method:"post",
    data: {menu:menu,icon:icon,link:link},
    success: function(data){
        if(data =="1"){
            swal({
  title: "Success!",
  text: "Navbar Menu Added Successfully",
  icon: "success",
  button: "Okay",
}).then(()=>{
        window.location.assign("/merohostel/admin/editnavbarmenu.php");
    });
        }else{
            swal({
  title: "Error!",
  text: "Please try again",
  icon: "error",
  button: "Okay",
});
        }
       
$("#editnavbarmenu").trigger("reset");
    }
})
    })
</script>
<script>
    $(document).on("click", "#deletenavbarmenu", function(e){
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

    let menu = $(this).data("menu");
    $.ajax({
        url: "_deletenavbarmenu.php",
        method:"POST",
        data : {menu:menu},
        success : function(data){
            swal("Success! Navbar Menu Deleted Successfully!", {
      icon: "success",
    }).then(()=>{
        window.location.assign("/merohostel/admin/editnavbarmenu.php");
    })
        }
    })
    
 
  } else {
    swal("Process Cancelled By User");
  }
});







    })
</script>