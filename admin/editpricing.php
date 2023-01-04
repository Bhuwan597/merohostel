<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>
<?php
$sql = "SELECT * FROM merohostel_pricing";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
echo'
<form id="editpricing" class="p-4">
  <div class="mb-3">
    <label for="onesitterprice" class="form-label">One Sitter Price</label>
    <input type="number" value="'.$row['onesitterprice'].'" class="form-control" id="onesitterprice" aria-describedby="" required auto-complete="off">
  </div>
  <div class="mb-3">
    <label for="twositterprice" class="form-label">Two Sitter Price</label>
    <input type="number"value="'.$row['twositterprice'].'" class="form-control" id="twositterprice" aria-describedby="" required auto-complete="off">
  </div>
  <div class="mb-3">
    <label for="threesitterprice" class="form-label">Three Sitter Price</label>
    <input type="number" value="'.$row['threesitterprice'].'" class="form-control" id="threesitterprice" aria-describedby="" required auto-complete="off">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>';
}
?>
<script>
    $("#editpricing").submit(function(e){
        e.preventDefault();
        let onesitterprice = $("#onesitterprice").val();
        let twositterprice = $("#twositterprice").val();
        let threesitterprice = $("#threesitterprice").val();
        $.ajax({
            url:"_editpricing.php",
            method:"POST",
            data: {onesitterprice:onesitterprice,twositterprice:twositterprice,threesitterprice:threesitterprice},
            success: function(data){
              if(data =="1"){
            swal({
  title: "Success!",
  text: "Pricing Changed Successfully",
  icon: "success",
  button: "Okay",
}).then(()=>{
        window.location.assign("/merohostel/admin/editpricing.php");
    });
        }else{
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
