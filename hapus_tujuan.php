<?php
session_start();
if(!isset($_SESSION["admin"])){
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
include "connection.php";
$id = $_GET["id"];
mysqli_query($link,"delete from tujuan_pembelajaran where id=$id");
?>

<script type="text/javascript">
window.location="admin_tujuan_pembelajaran.php";
</script>