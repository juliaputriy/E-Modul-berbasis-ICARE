<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Admin - Modul CT</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="">
      <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ffc107">
           <div class="featured-image mb-3">
            <img src="assets/img/logo.png" class="img-fluid" style="width: 400px;">
           </div>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6" style="padding: 30px 20px 30px 30px;">
          <div class="row align-items-center">
                <div class="mb-4">
                        <h2>Hello Admin</h2>
                     <p>Selamat Datang !</p>
               </div>
                <form action="" name="form1" method="post">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" placeholder="Username" name="username" required/>
                    <label for="inputEmail">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" placeholder="Password" name="password" required/>
                    <label for="inputPassword">Password</label>
                </div> 
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" name="submit1" style="width:100%;" class="btn btn-warning text-center">Masuk</button>
                </div>
                <div class="alert alert-danger" role="alert" id="error" style="display:none;">Username atau Password salah</div>
            </form>
          </div>
       </div> 

      </div>
    </div>        
        <?php
if (isset($_POST["submit1"])) {
    $count = 0;
    $username = mysqli_real_escape_string($link,$_POST["username"]);
    $password = mysqli_real_escape_string($link,$_POST["password"]);

    $res = mysqli_query($link,"select * from admin_login where username='$username' && password='$password'");
    $count=mysqli_num_rows($res);
    if($count==0){
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display="block";
        </script>
        <?php
    }else{
        $_SESSION["admin"]=$username;
        ?>
        <script type="text/javascript">
            window.location="admin_dashboard.php";
        </script>
        <?php
    }


    }
?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
