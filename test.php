<div class="p-3 bg-dark text-white">
  <div class="flexMain">
    <div class="flex1">
    </div>
    <div class="flex2 text-center">
      <div><strong>Boys Residency</strong></div>
    </div>
    <div class="flex1">
 
    </div>
  </div>
</div>
<div id="menuHolder">
    <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
      <div class="flexMain">
        <div class="flex2">
          <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fas fa-bars me-2"></i> MENU</button>
        </div>
        <div class="flex3 text-center" id="siteBrand" style="line-height: 2;">Mero Hostel
        </div> 
        <div class="flex2 text-end d-none d-md-block">
          <button class="whiteLink siteLink">REGISTER</button>
          <button class="blackLink siteLink">Login</button>
        </div>
      </div>
   </div>
    <div id="menuDrawer">
          <div class="p-4 border-bottom">
            <div class="row">
               <h3 style="line-height: 1.5;">Mero Hostel</h3>
              <div class="col text-end ">
                <i class="fas fa-times" role="btn" onclick="menuToggle()"></i>
              </div>
            </div>
          </div>
      <a href="#" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
<?php
$sql = "SELECT * FROM merohostel_navbar";
$result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'<a href="'.$row['link'].'" class="nav-menu-item"><i class="'.$row['icon'].'"></i>'.$row['menu'].'</a>';  
   }
  ?>
 </div>
  </div>