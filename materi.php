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
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Materi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kelola Materi</li>
                        </ol>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Materi
                                        </div>
                                            <div class="card-body">
                                                <form style="margin:5px;" name="form1" action="" method="post">
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="materi"  placeholder="Masukkan materi latihan">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <input type="text" class="form-control" name="examtime"  placeholder="Masukkan waktu latihan">
                                                    </div>
                                                   
                                                    <button type="submit" name="submit1" value="Add materi" class="btn btn-warning">Submit</button>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Materi
                                        </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Materi</th>
                                                        <th scope="col">waktu</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 0;
                                                        $res = mysqli_query($link,"select * from materi");
                                                        while($row=mysqli_fetch_array($res)){
                                                            $count=$count+1;
                                                            ?>
                                                            <tr>
                                                                <td scope="row"><?php echo $count; ?></td>
                                                                <td><?php echo $row["materi"];?></td>
                                                                <td><?php echo $row["exam_time_in_minutes"];?></td>
                                                                <td><a href="edit_materi.php?id=<?php echo $row["id"];?>">Edit</a></td>
                                                                <td><a href="hapus_materi.php?id=<?php echo $row["id"];?>">Hapus</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                </main>
                <?php
            if(isset($_POST["submit1"])){
            mysqli_query($link,"insert into materi values(NULL,'$_POST[materi]','$_POST[examtime]')") or die(mysqli_error($link));
            ?>
            <script>
                alert("Berhasil menambah materi baru ");
            </script>
            <?php
        }
        ?>
                <?php
                include "footer.php";
                ?>
