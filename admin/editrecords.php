<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>
<div class="container">

    <form  id="editrecords">


    <?php
$sql = "SELECT * FROM merohostel_records";
$result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo' <label for="happystudents" class="form-label">Happy Students</label>
    <input type="range" class="form-range" min="100" max="10000" step="10" id="happystudents" oninput="one.value = this.value" value="'.$row['happystudents'].'">
    <output class="d-block mb-3 text-success fs-4" id="one">'.$row['happystudents'].'</output>
    
    <label for="registeredmembers" class="form-label">Registered Members</label>
    <input type="range" class="form-range" min="100" max="10000" step="10" id="registeredmembers"oninput="two.value = this.value" value="'.$row['registeredmembers'].'">
    <output class="d-block mb-3 text-danger fs-4" id="two">'.$row['registeredmembers'].'</output>
    
    <label for="availablehostelstudents" class="form-label">Available Hostel Students</label>
    <input type="range" class="form-range" min="100" max="10000" step="10" id="availablehostelstudents"oninput="three.value = this.value" value="'.$row['availablehostelstudents'].'">
    <output class="d-block mb-3 text-warning fs-4" id="three">'.$row['availablehostelstudents'].'</output>
    
    <label for="admissions" class="form-label">Admissions</label>
    <input type="range" class="form-range" min="100" max="10000" step="10" id="admissions"oninput="four.value = this.value" value="'.$row['admissions'].'">
    <output class="d-block mb-3 text-info fs-4" id="four">'.$row['admissions'].'</output>';
   }
   ?>
   <button type="submit" class="btn btn-primary"><span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>Submit</button> 
</form>
    </div>
   <script>
    $("#editrecords").submit(function(e){
        e.preventDefault();
        let happystudents = $("#happystudents").val();
        let registeredmembers = $("#registeredmembers").val();
        let availablehostelstudents = $("#availablehostelstudents").val();
        let admissions = $("#admissions").val();
        $("#spinner").removeClass("d-none");
        $.ajax({
    url:"_editrecords.php",
    method:"post",
    data: {happystudents:happystudents,registeredmembers:registeredmembers,availablehostelstudents:availablehostelstudents,admissions:admissions},
    success: function(data){
        if(data =="1"){
            swal({
  title: "Success!",
  text: 'Records Updated Successfully.',
  icon: "success",
  button: "Okay",
}).then(()=>{
        window.location.assign("/merohostel/admin/editrecords.php");
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