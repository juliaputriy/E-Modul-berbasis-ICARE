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