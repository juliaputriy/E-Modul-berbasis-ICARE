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
        $res=mysqli_query($link,"select * from materi where id=$id");
        while($row=mysqli_fetch_array($res)){
            $materi = $row["materi"];
            $exam_time = $row["exam_time_in_minutes"];
        }
        
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Materi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Materi</li>
                        </ol>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Edit Materi
                                        </div>
                                            <div class="card-body">
                                                <form style="margin:5px;" name="form1" action="" method="post">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="materi" value="<?php echo $materi;?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="examtime" value="<?php echo $exam_time;?>">
                                                    </div>
                                                    <br>
                                                    <button type="submit" name="submit1" value="Edit Materi" class="btn btn-warning">Submit</button>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                </main>
                <?php
            if(isset($_POST["submit1"])){
            mysqli_query($link,"update materi set materi = '$_POST[materi]', exam_time_in_minutes='$_POST[examtime]' where id=$id") or die(mysqli_error($link));
            ?>
            <script>
                window.location="materi.php";
            </script>
            <?php
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
