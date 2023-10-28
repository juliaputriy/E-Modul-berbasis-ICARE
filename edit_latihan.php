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
$pertanyaan = '';
$pil1 = '';
$pil2 = '';
$pil3 = '';
$pil4 = '';
$pil5 = '';
$jawaban = '';
$res = mysqli_query($link,"select * from latihan where id=$id");
while($row=mysqli_fetch_array($res)){
    $pertanyaan=$row["pertanyaan"];
    $pil1=$row["pil1"];
    $pil2=$row["pil2"];
    $pil3=$row["pil3"];
    $pil4=$row["pil4"];
    $pil5=$row["pil5"];
    $jawaban=$row["jawaban"];
}
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Materi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kelola Latihan</li>
                            <li class="breadcrumb-item active">Tambah Latihan</li>
                            <li class="breadcrumb-item active">Edit Latihan</li>
                        </ol>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Edit Pertanyaan
                                        </div>
                                            <div class="card-body">
                                                <form style="margin:5px;" name="form1" action="" method="post">
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pertanyaan" value="<?php echo $pertanyaan;?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil1" value="<?php echo $pil1;?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil2" value="<?php echo $pil2;?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil3" value="<?php echo $pil3;?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil4" value="<?php echo $pil4;?>">
                                                    </div>
                                                     <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil5" value="<?php echo $pil5;?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="jawaban" value="<?php echo $jawaban;?>">
                                                    </div>
                                                    <button type="submit" name="submit1" value="Add latihan" class="btn btn-warning">Submit</button>
                                                </form>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                </div>
                            </div>
                        </div>
                </main>
        <?php
            if(isset($_POST["submit1"])){
            mysqli_query($link,"update latihan set pertanyaan='$_POST[pertanyaan]',pil1='$_POST[pil1]',pil2='$_POST[pil2]',pil3='$_POST[pil3]',pil4='$_POST[pil4]',pil5='$_POST[pil5]',jawaban='$_POST[jawaban]' where id=$id");
            ?>
            <script type="text/javascript">
                window.location="add_edit_latihan.php?id=<?php echo $id1?>";
            </script>
            <?php
        }
        ?>
       