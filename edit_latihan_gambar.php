<?php
session_start();
include "connection.php";
if(!isset($_SESSION["admin"])){
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
include "header.php";
$id = $_GET["id"];
$id1 = $_GET["id1"];
$pertanyaan ="";
$pil1 ="";
$pil2 ="";
$pil3 ="";
$pil4 ="";
$jawaban ="";
$res = mysqli_query($link,"select * from latihan where id=$id");
while($row=mysqli_fetch_array($res)){
    $pertanyaan=$row["pertanyaan"];
    $pil1=$row["pil1"];
    $pil2=$row["pil2"];
    $pil3=$row["pil3"];
    $pil4=$row["pil4"];
    $jawaban=$row["jawaban"];
}
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Materi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Latihan</li>
                        </ol>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Edit Latihan
                                        </div>
                                            <div class="card-body">
                                                <form style="margin:5px;" name="form1" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="fpertanyaan" value="<?php echo $pertanyaan;?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <img src="<?php echo $pil1;?>" height="50" width="50"><br>
                                                        <input type="file" class="form-control" name="fpil1">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <img src="<?php echo $pil2;?>" height="50" width="50"><br>
                                                        <input type="file" class="form-control" name="fpil2" >
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <img src="<?php echo $pil3;?>" height="50" width="50"><br>
                                                        <input type="file" class="form-control" name="fpil3" >
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <img src="<?php echo $pil4;?>" height="50" width="50"><br>
                                                        <input type="file" class="form-control" name="fpil4">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <img src="<?php echo $fjawaban;?>" height="50" width="50"><br>
                                                        <input type="file" class="form-control" name="fjawaban">
                                                    </div>
                                                    <button type="submit" name="submit2" value="Update latihan" class="btn btn-warning">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
        <?php
            if(isset($_POST["submit2"])){
            $pil1 = $_FILES["fpil1"]["name"];
            $pil2 = $_FILES["fpil2"]["name"];
            $pil3 = $_FILES["fpil3"]["name"];
            $pil4 = $_FILES["fpil4"]["name"];
            $jawaban = $_FILES["fjawaban"]["name"];
            $tm=md5(time());

            if($pil1!=""){
            $dst1="./opt_images/" . $tm . $pil1;
            $dst_db1="opt_images/" . $tm . $pil1;
            move_uploaded_file($_FILES["fpil1"]["tmp_name"], $dst1);
            mysqli_query($link,"update latihan set pertanyaan='$_POST[fpertanyaan]',pil1='$dst_db1' where id=$id");
            }
            }
        ?>