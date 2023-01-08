<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>

<div class="container-fluid p-4">

    <form id="admissionform" enctype="multipart/form-data">
        <div class="form-floating">
            <select class="form-select" id="name" aria-label="Floating label select example">
                <option value="" selected>Open this select menu</option>
                <?php
                $sql= "SELECT * FROM `merohostel_users`;";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo'<option value="'.$row['email'].'">'.$row['name'].': '.$row['email'].'</option>';
                }
                ?>
                
            </select>
            <label for="floatingSelect">Works with selects</label>
        </div>

        <button type="submit" class="btn btn-primary my-4">
            <div id="spinner" class="spinner-border spinner-border-sm d-none
            me-3" role="status">
                <span class="visually-hidden"></span>
            </div>Send Message
        </button>
    </form>
</div>
<script>
    $("#name").on("change", function() {
  $("#email option:eq(1)").prop("selected", true);
});
</script>