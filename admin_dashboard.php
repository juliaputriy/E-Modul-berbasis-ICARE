<?php
session_start();
include "connection.php";
$data_barang = mysqli_query($link,"SELECT exam_type FROM v_variabel");
$penjualan = mysqli_query($link,"SELECT rata AS sold FROM v_variabel");
$data_barang2 = mysqli_query($link,"SELECT exam_type FROM v_tipedata");
$penjualan2 = mysqli_query($link,"SELECT rata AS sold FROM v_tipedata");
if(!isset($_SESSION["admin"])){
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
include "header.php";
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Dashboard</h1> -->
                        <ol class="breadcrumb mb-4 mt-4">
                            <li class="breadcrumb-item active">Dashboard Admin</li>
                        </ol>
                    </div>
                    <div class="container-fluid px-4">
                        <div>
                            <?php
                            $count=0;
                            $res=mysqli_query($link,"select * from exam_result order by id desc");
                            $count=mysqli_num_rows($res);
                            if($count==0){
                                ?>
                                <h1>no result</h1>
                                <?php
                            }else{
                                echo "<table id=datatablesSimple>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>"; echo "Nama Siswa"; echo "</th>";
                                            echo "<th>"; echo "Materi"; echo "</th>";
                                            echo "<th>"; echo "Jumlah Soal"; echo "</th>";
                                            echo "<th>"; echo "Jawaban Benar"; echo "</th>";
                                            echo "<th>"; echo "Jawaban Salah"; echo "</th>";
                                            echo "<th>"; echo "Waktu"; echo "</th>";
                                            echo "<th>"; echo "Status"; echo "</th>";
                                        echo "</tr>";
                                    echo "</thead>";           
                                echo "<tbody>";
                                    while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";
                                        echo "<th>"; echo $row["username"]; echo "</th>";
                                        echo "<th>"; echo $row["exam_type"]; echo "</th>";
                                        echo "<th>"; echo $row["total_question"]; echo "</th>";
                                        echo "<th>"; echo $row["correct_answer"]; echo "</th>";
                                        echo "<th>"; echo $row["wrong_answer"]; echo "</th>";
                                        echo "<th>"; echo $row["exam_time"]; echo "</th>";
                                        echo "<th>";
                    if($row["correct_answer"]<$row["total_question"]-2){
                    echo "<span class='badge' style='background-color: red; color: white;'>"; 
                        echo "Remedial"; 
                        echo"</span>";
                        }else{
                        echo "<span class='badge mb-3' style='background-color: green; color: white;'>"; 
                    echo "Lulus"; 
                    echo"</span>";
                    }
                    echo "</th>";
                                    echo "</tr>";
                                    }
                                echo "</tbody>";
                                echo "</table>";
                            }
                            ?>
                        </div><br>
                    <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card mb-4">
                                            <div class="card-body">
                                                <canvas id="outbound"></canvas>
                                                <script>
                                                    var ctx = document.getElementById("outbound").getContext('2d');
                                                    var myChart = new Chart(ctx, {
                                                        type: 'bar',
                                                        data: {
                                                            labels: [<?php while($row = mysqli_fetch_array($data_barang)) {echo '"'.$row['exam_type']. '",';}?>],
                                                            datasets: 
                                                            [
                                                            {
                                                                label: '# Rata-rata',
                                                                data: [<?php while($row = mysqli_fetch_array($penjualan)) {echo '"'.$row['sold']. '",';}?>],
                                                                backgroundColor: ['#7FFFD4', '#17BEBB', '#FFC914','#7FFF00','#9932CC','#008000','#17BEBB'],
                                                                borderWidth: 1
                                                            }
                                                            ]
                                                        },
                                                        options: {
                                                            scales: {
                                                                yAxes: [{
                                                                    ticks: {
                                                                        beginAtZero:true
                                                                    }
                                                                }]
                                                            }
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="col-sm">
                                    <div class="card mb-4">
                                            <div class="card-body">
                                                <canvas id="outbound2"></canvas>
                                                    <script>
                                                        var ctx = document.getElementById("outbound2").getContext('2d');
                                                        var myChart = new Chart(ctx, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: [<?php while($row2 = mysqli_fetch_array($data_barang2)) {echo '"'.$row2['exam_type']. '",';}?>],
                                                                datasets: 
                                                                [
                                                                {
                                                                    label: '# Rata-rata',
                                                                    data: [<?php while($row2 = mysqli_fetch_array($penjualan2)) {echo '"'.$row2['sold']. '",';}?>],
                                                                    backgroundColor: ['#7FFFD4', '#17BEBB', '#FFC914','#7FFF00','#9932CC','#008000','#17BEBB'],
                                                                    borderWidth: 1
                                                                }
                                                                ]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    yAxes: [{
                                                                        ticks: {
                                                                            beginAtZero:true
                                                                        }
                                                                    }]
                                                                }
                                                            }
                                                        });
                                                    </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<?php
include "footer.php";
?>