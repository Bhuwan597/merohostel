<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php require("../frontend/_links.php"); ?>
<?php require("../backend/dbconfig.php"); ?>
<?php require("adminnavbar.php");?>

<style>
body {
    background-color: #eee;
}

.card {
    background-color: white !important;
    border: none !important;
    border-radius: 0px !important;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px !important
}

.card:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important
}

.card>a {
    text-decoration: none !important;
    color: black !important
}

#blockitems {
    margin-right: 0px !important;
    margin-left: 0px !important
}

#icons_section {
    width: 30%;
    text-align: center;
    padding: 0% !important
}

#icons_section>i {
    font-size: 25px;
    color: black !important
}

#heading_section {
    width: 70%
}

#heading_section>h6 {
    margin-bottom: 0px !important;
    color: #990ae3 !important
}

#heading_section>p {
    font-size: 14px !important
}

.cssanimation {
    animation-duration: 1s;
    animation-fill-mode: both
}

.fadeInBottom {
    animation-name: fadeInBottom
}

@keyframes fadeInBottom {
    from {
        opacity: 0;
        transform: translateY(100%)
    }

    to {
        opacity: 1
    }
}

.cssanimation2 {
    animation-duration: 2s;
    animation-fill-mode: both
}

.fadeInBottom2 {
    animation-name: fadeInBottom
}

@keyframes fadeInBottom2 {
    from {
        opacity: 0;
        transform: translateY(100%)
    }

    to {
        opacity: 1
    }
}

.cssanimation3 {
    animation-duration: 3s;
    animation-fill-mode: both
}

.fadeInBottom3 {
    animation-name: fadeInBottom
}

@keyframes fadeInBottom3 {
    from {
        opacity: 0;
        transform: translateY(100%)
    }

    to {
        opacity: 1
    }
}
</style>
<div class="container">
    <div class="row">
        <?php
 $sql = "SELECT * FROM `merohostel_contactus` ORDER BY sn DESC;";
 $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo ' <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
    <div class="row " style="padding: 10px;">
        <div class="col-xl-12">
            <div class="card cssanimation fadeInBottom"> <a style="cursor:pointer;" class="reply" target="_blank">
                    <div class="card-body">
                        <div class="row" id="blockitems">
                            <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1 d-flex justify-content-center align-items-center" id="icons_section"> <i
                                    class="fa fa-message" style="font-size: 40px" aria-hidden="true"></i> </div>
                            <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                <h6>'.$row['name'].'</h6>
                                <h6>'.$row['email'].'</h6>
                                <h6>'.$row['phone'].'</h6>
                                <p>'.$row['message'].'</p>
                                <div class="card-footer text-muted">
                                '.$row['dateofsubmit'].'
                                </div>
                            </div>
                        </div>
                    </div>
                </a> </div>
        </div>
    </div>
</div>';
   };

?>

    </div>
</div>

<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="replyModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="replyname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="replyname" aria-describedby="emailHelp" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="replyemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="replyemail" aria-describedby="emailHelp" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="replymessage" class="form-label"></label>
                        <textarea rows="10" type="text" class="form-control" id="replymessage" aria-describedby="emailHelp" required placeholder="Your Reply Message"></textarea>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Send Mail</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
 reply = document.getElementsByClassName('reply');
    Array.from(reply).forEach((elements) => {
      elements.addEventListener("click", (e) => {
        let div = e.target.parentNode.parentNode;
        details = div.getElementsByTagName("div")[1].innerHTML;
        fullname = div.getElementsByTagName("h6")[0].innerText;
        email = div.getElementsByTagName("h6")[1].innerText;
        phone = div.getElementsByTagName("h6")[2].innerText;
        message = div.getElementsByTagName("p")[0].innerText;
        replyname.value= fullname;
        replyemail.value = email;
        $("#replyModal").modal('toggle');

      })
    })
</script>