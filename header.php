<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modul CT Admin</title>
            <link rel="stylesheet" href="assets/style.css">
    <script src="assets/Chart.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
                        <a class="navbar-brand ps-3" href=""><i class="fa-solid fa-swatchbook" style="color: #ffffff;"></i><b> E-Modul CT</b></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                   <span class="admin-name" style="color:white;">Welcome ADMIN</span>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <center><img src="assets/img/logo.png" class="img-fluid" style="width:100px;"></center>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="admin_dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <a class="nav-link" href="admin_petunjuk_pembelajaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Petunjuk
                            </a>
                            <a class="nav-link" href="admin_tujuan_pembelajaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tujuan Pembelajaran
                            </a>
                            <a class="nav-link" href="sub_topik.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Sub Topik
                            </a>
                            <div class="sb-sidenav-menu-heading">Kegiatan</div>
                            <a class="nav-link" href="materi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Kelola Materi
                            </a>
                            <a class="nav-link" href="latihan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Kelola Latihan
                            </a>
                            <a class="nav-link" href="kegiatan1.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Kegiatan 1
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Kegiatan</div> -->
                            <a class="nav-link collapsed" href="kegiatan2.php" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Kegiatan 2
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="materi1.php">Materi 1</a>
                                    <a class="nav-link" href="materi2.php">Materi 2</a>
                                </nav>
                            </div>
                            <!-- <a class="nav-link" href="kegiatan3.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Kegiatan 3 
                            </a>
                            <a class="nav-link" href="kegiatan4.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Kegiatan 4 
                            </a> -->
                            <!-- <a class="nav-link" href="kegiatan3.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kegiatan 5 
                            </a> -->
                            <div class="sb-sidenav-menu-heading">Core</div>
                             <!-- <a class="nav-link" href="rangkuman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Rangkuman 
                            </a> -->
                            <a class="nav-link" href="dafpus.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Daftar Pustaka
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
