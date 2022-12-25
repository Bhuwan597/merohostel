  <div class="container px-4 py-5" id="hanging-icons">
      <h2 class="pb-2 border-bottom">Services in mero Hostel</h2>
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

          <?php
    require("./backend/dbconfig.php");
$sql = "SELECT * FROM merohostel_services";
$result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'      <div class="col d-flex align-items-start">
    <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
      <i class="'.$row['serviceicon'].'" width="1em" height="1em"></i>
    </div>
    <div>
      <h3 class="fs-2">'.$row['servicetitle'].'</h3>
      <p>'.$row['servicedescription'].'</p>
      <button value="'.$row['servicebuttonvalue'].'" href="#" class="'.$row['servicebuttoncolor'].'">
        Primary button
      </button>
    </div>
  </div>';
 }
?>
      </div>
      <hr>
  </div>