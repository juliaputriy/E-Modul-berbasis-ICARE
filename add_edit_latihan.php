<?php
session_start();
include "header.php";
include "connection.php";

if(!isset($_SESSION["admin"])){
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
$id = $_GET["id"];
$materi = '';
$res = mysqli_query($link,"select * from materi where id=$id");
while($row=mysqli_fetch_array($res)){
    $materi=$row["materi"];
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
                        </ol>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Tambah Pertanyaan mengenai <?php echo "<font-color='red'>" .$materi. "</font>";?>
                                        </div>
                                            <div class="card-body">
                                                <form style="margin:5px;" name="form1" action="" method="post">
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pertanyaan" placeholder="Masukkan Pertanyaan">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil1" placeholder="Masukkan Pilihan Jawaban 1">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil2" placeholder="Masukkan Pilihan Jawaban 2">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil3" placeholder="Masukkan Pilihan Jawaban 3">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil4" placeholder="Masukkan Pilihan Jawaban 4">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="pil5" placeholder="Masukkan Pilihan Jawaban 5">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="jawaban" placeholder="Masukkan Jawaban">
                                                    </div>
                                                    <button type="submit" name="submit1" value="Add latihan" class="btn btn-warning">Submit</button>
                                                </form>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Materi
                                        </div>
                                            <div class="card-body">
                                                <form style="margin:5px;" name="form1" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="fpertanyaan" placeholder="Masukkan Pertanyaan">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="file" class="form-control" name="fpil1" placeholder="Masukkan Pilihan Jawaban 1">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="file" class="form-control" name="fpil2" placeholder="Masukkan Pilihan Jawaban 2">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="file" class="form-control" name="fpil3" placeholder="Masukkan Pilihan Jawaban 3">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="file" class="form-control" name="fpil4" placeholder="Masukkan Pilihan Jawaban 4">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="file" class="form-control" name="fpil5" placeholder="Masukkan Pilihan Jawaban 4">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="file" class="form-control" name="fjawaban" placeholder="Masukkan Jawaban">
                                                    </div>
                                                    <button type="submit" name="submit2" value="Add latihan" class="btn btn-warning">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
                <div class="col-sm px-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>Materi
                        </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Pilihan 1</th>
                                        <th scope="col">Pilihan 2</th>
                                        <th scope="col">Pilihan 3</th>
                                        <th scope="col">Pilihan 4</th>
                                        <th scope="col">Pilihan 5</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                         </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $res = mysqli_query($link,"select * from latihan where materi='$materi' order by pertanyaan_no asc");
                                        while($row=mysqli_fetch_array($res)){
                                            echo "<tr>";
                                            echo "<td>"; echo $row["pertanyaan_no"]; echo "</td>";
                                            echo "<td>"; echo $row["pertanyaan"]; echo "</td>";
                                            echo "<td>"; 
                                            if(strpos($row["pil1"],'opt_images/') !== false){
                                                ?>
                                                <img src="<?php echo $row["pil1"];?>" height="50" width="50">
                                                <?php
                                            }else{
                                                echo $row["pil1"];
                                            }
                                            echo "</td>";
                                            echo "<td>"; 
                                            if(strpos($row["pil2"],'opt_images/') !== false){
                                                ?>
                                                <img src="<?php echo $row["pil2"];?>" height="50" width="50">
                                                <?php
                                            }else{
                                                echo $row["pil2"];
                                            }
                                            echo "</td>";
                                            echo "<td>"; 
                                            if(strpos($row["pil3"],'opt_images/') !== false){
                                                ?>
                                                <img src="<?php echo $row["pil3"];?>" height="50" width="50">
                                                <?php
                                            }else{
                                                echo $row["pil3"];
                                            }
                                            echo "</td>";
                                            echo "<td>"; 
                                            if(strpos($row["pil4"],'opt_images/') !== false){
                                                ?>
                                                <img src="<?php echo $row["pil4"];?>" height="50" width="50">
                                                <?php
                                            }else{
                                                echo $row["pil4"];
                                            }
                                            echo "</td>";
                                            echo "<td>"; 
                                            if(strpos($row["pil4"],'opt_images/') !== false){
                                                ?>
                                                <a href="edit_latihan_gambar.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>">Edit</a>
                                                <?php
                                            }else{
                                                ?>
                                                <a href="edit_latihan.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>">Edit</a>
                                                <?php
                                            }
                                            echo "</td>";
                                            echo "<td>"; 
                                            if(strpos($row["pil5"],'opt_images/') !== false){
                                                ?>
                                                <a href="edit_latihan_gambar.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>">Edit</a>
                                                <?php
                                            }else{
                                                ?>
                                                <a href="edit_latihan.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>">Edit</a>
                                                <?php
                                            }
                                            echo "</td>";
                                            echo "<td>"; 
                                            ?>
                                            <a href="hapus_latihan.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>">Hapus</a>
                                            <?php
                                            echo "</td>";
                                            echo "</tr>";
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>





        <?php
            if(isset($_POST["submit1"])){
            $loop=0;
            $count=0;
            $res=mysqli_query($link,"select * from latihan where materi='$materi' order by id asc") or die(mysqli_error($link));
            $count=mysqli_num_rows($res);
            if($count==0){

            }else{
                while($row=mysqli_fetch_array($res)){
                    $loop=$loop+1;
                    mysqli_query($link,"update latihan set pertanyaan_no='$loop' where id=$row[id]");
                }
            }
            $loop=$loop+1;
            mysqli_query($link,"insert into latihan values(NULL,'$loop','$_POST[pertanyaan]','$_POST[pil1]','$_POST[pil2]','$_POST[pil3]','$_POST[pil4]','$_POST[pil5]','$_POST[jawaban]','$materi')") or die(mysqli_error($link));
        }
        ?>
        <?php
            if(isset($_POST["submit2"])){
            $loop=0;
            $count=0;
            $res=mysqli_query($link,"select * from latihan where materi='$materi' order by id asc") or die(mysqli_error($link));
            $count=mysqli_num_rows($res);
            if($count==0){

            }else{
                while($row=mysqli_fetch_array($res)){
                    $loop=$loop+1;
                    mysqli_query($link,"update latihan set pertanyaan_no='$loop' where id=$row[id]");
                }
            }
            $loop=$loop+1;

            $tm=md5(time());

            $fnm1=$_FILES["fpil1"]["name"];
            $dst1="./opt_images/".$tm.$fnm1;
            $dst_db1="opt_images/".$tm.$fnm1;
            move_uploaded_file($_FILES["fpil1"]["tmp_name"],$dst1);

            $fnm2=$_FILES["fpil2"]["name"];
            $dst2="./opt_images/".$tm.$fnm2;
            $dst_db2="opt_images/".$tm.$fnm2;
            move_uploaded_file($_FILES["fpil2"]["tmp_name"],$dst2);

            $fnm3=$_FILES["fpil3"]["name"];
            $dst3="./opt_images/".$tm.$fnm3;
            $dst_db3="opt_images/".$tm.$fnm3;
            move_uploaded_file($_FILES["fpil3"]["tmp_name"],$dst3);

            $fnm4=$_FILES["fpil4"]["name"];
            $dst4="./opt_images/".$tm.$fnm4;
            $dst_db4="opt_images/".$tm.$fnm4;
            move_uploaded_file($_FILES["fpil4"]["tmp_name"],$dst4);

            $fnm6=$_FILES["fpil5"]["name"];
            $dst6="./opt_images/".$tm.$fnm6;
            $dst_db6="opt_images/".$tm.$fnm6;
            move_uploaded_file($_FILES["fpil5"]["tmp_name"],$dst6);

            $fnm5=$_FILES["fjawaban"]["name"];
            $dst5="./opt_images/".$tm.$fnm5;
            $dst_db5="opt_images/".$tm.$fnm5;
            move_uploaded_file($_FILES["fjawaban"]["tmp_name"],$dst5);

            mysqli_query($link,"insert into latihan values(NULL,'$loop','$_POST[fpertanyaan]','$dst_db1','$dst_db2','$dst_db3','$dst_db4', '$dst_db6','$dst_db5','$materi')") or die(mysqli_error($link));
        
        }
        ?>