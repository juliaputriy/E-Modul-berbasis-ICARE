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
        $res=mysqli_query($link,"select * from tujuan_pembelajaran where id=$id");
        while($row=mysqli_fetch_array($res)){
            $description = $row["description"];
        }
        
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tujuan Pembelajaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Tujuan Pembelajaran</li>
                        </ol>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i>Edit Tujuan Pembelajaran
                                        </div>
                                            <div class="card-body">
                                                <form style="margin:5px;" name="form1" action="" method="post">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="description" value="<?php echo $description;?>">
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
            mysqli_query($link,"update tujuan_pembelajaran set description = '$_POST[description]' where id=$id") or die(mysqli_error($link));
            ?>
            <script>
                window.location="admin_tujuan_pembelajaran.php";
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
