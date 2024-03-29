<style>
.flexMain {
  display:flex;
  align-items: center
}
.flex1 { flex:1 }
.flex2 { flex:2 }
.flex3 { flex:3 }
 
a.siteLink {
  margin-left:-5px;
  border:none;
  padding:24px;
  display:inline-block;
  min-width:115px;
  cursor: pointer;
  text-decoration: none;
}
button.siteLink {
  margin-left:-5px;
  border:none;
  padding:24px;
  display:inline-block;
  min-width:115px;
}
.whiteLink {
  background : #fff;
}
.whiteLink:active {
  background : #000;
  color: #fff;
}
.blackLink {
  color: #fff;
  background:#232323;
  transition: all 300ms linear;
}
 
.blackLink:active {
  color: #000;
  background:#fff
}
#siteBrand {
  font-family: impact;
  letter-spacing : -1px;
  font-size:32px;
  color:#252525;
  line-height : 1em;
}
#menuDrawer {
  background:#fff;
  position:fixed;
  height:100vh;
  overflow:auto;
  z-index:12312;
  top:0;
  left:0;
  border-right:1px solid #eaeaea;
  min-width:25%;
  max-width:320px;
  width:100%;
  transform : translateX(-100%);
  transition : transform 200ms linear;
}
#mainNavigation {
  transition : transform 200ms linear;
  background : #fff;
}
.drawMenu > #menuDrawer {
  transform : translateX(0%);
}
.drawMenu > #mainNavigation {
  transform : translateX(25%);
}
.fa-times {
  cursor : pointer
}
a.nav-menu-item:hover {
  margin-left:2px;
  border-left:10px solid black;
}
a.nav-menu-item{
  transition:border 200ms linear;
  text-decoration:none;
  display:block;
  padding:18px;
  padding-left:32px;
  border-bottom:1px solid #eaeaea;
  font-weight:bold;
  color:#343434
}
select.noStyle {
  border:none;
  outline:none
} 
</style>
<a?php require("_links.php");?>
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
<div id="menuHolder" style="overflow-x: hidden;" class="sticky-top">
    <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
      <div class="flexMain">
        <div class="flex2">
          <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fa-solid fa-bars me-2"></i> MENU</button>
        </div>
        <div class="flex3 text-center" id="siteBrand">Mero Hostel
        </div> 
        <div class="flex2 text-end d-none d-md-block">
        <?php
          if(isset($_SESSION['email'])){
            echo'
            <a onclick="logout()" class="blackLink siteLink">LOGOUT</a>
          ';
          }else{
            echo'   <a href="signup.php" class="whiteLink siteLink">SIGNUP</a>
            <a href="login.php" class="blackLink siteLink">Login</a>';
          }

          ?>
        
        </div>
      </div>
   </div>
    <div id="menuDrawer">
          <div class="p-4 border-bottom">
            <div class="row">
               <h3>Mero Hostel</h3>
              <div class="col text-end ">
                <i style="cursor:pointer;" class="fa-solid fa-xmark" role="btn" onclick="menuToggle()"></i>
              </div>
            </div>
          </div>
     
      <?php
          if(isset($_SESSION['email'])){
            echo'  <a href="userdashboard.php" class="nav-menu-item"><i class="fas fa-gear me-3"></i>Dashboard</a> <a href="#" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>';
          }else{
            echo' <a href="#" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>';
           

          }

          ?>
<?php
$sql = "SELECT * FROM merohostel_navbar";
$result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'<a href="'.$row['link'].'" class="nav-menu-item"><i class="'.$row['icon'].'"></i>'.$row['menu'].'</a>';  
   }
  ?>


<?php
          if(isset($_SESSION['email'])){
            echo'   <div class="container-fluid my-2">
            <a onclick="logout()"  class="blackLink siteLink">LOGOUT</a>
          </div>';
          }else{
            echo'  <div class="container-fluid my-2">
            <a  href="login.php" class="blackLink siteLink">LOGIN</a>
            <a  href="signup.php" class="whiteLink siteLink">SIGNUP</a>
          </div>';
          }

          ?>

 </div>
  </div>
<script>
var menuHolder = document.getElementById('menuHolder')
var siteBrand = document.getElementById('siteBrand')
function menuToggle(){
  if(menuHolder.className === "drawMenu") menuHolder.className = ""
  else menuHolder.className = "drawMenu"
}
if(window.innerWidth < 426) siteBrand.innerHTML = "Mero Hostel"
window.onresize = function(){
  if(window.innerWidth < 420) siteBrand.innerHTML = "Mero Hostel"
  else siteBrand.innerHTML = "Mero Hostel"

}
</script>
<script>
  function logout(e){
    swal({
  title: "Are you sure?",
  text: "You want to logout!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:"../backend/_logout.php",
      method:"post",
      data:{logout:"logout"},
      success:function(data){
        swal("You are logged out now.", {
      icon: "success",
    }).then((value) => {
        window.location.assign("/merohostel/frontend/index.php");
});
      }
    })
   
  } else {
    swal("Your are not logged out yet.");
  }
});
  }
</script>