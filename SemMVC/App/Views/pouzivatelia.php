<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Urel's Forum</title>

    <!-- bootstrap 5 load -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- my css -->
    <link href="styles.css" rel="stylesheet" />

    <!-- javaScript -->
    <script src="../Controllers/script.js"></script>


    <!-- JQUERY load -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body id="page-top">
<!-- Header-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-1">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="#">Urel's Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#responsive-navbar" aria-controls="responsive-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="responsive-navbar" class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li><a class="nav-link px-4 fw-bolder" href="domov.php">Domov</a></li>
                <li><a class="nav-link px-4 fw-bolder" href="forum.php">Fóra</a></li>
                <li><a class="nav-link px-4 fw-bolder" href="novinky.php">Novinky</a></li>
                <?php
                if ($_SESSION['id'] != "") {
                    echo "<li><a class=\"nav-link px-4 fw-bolder\" onclick=\"userLogout()\"  href=\"#\">Odhlásiť</a></li>
                            ";
                } else {
                    echo "<li><a class=\"nav-link px-4 fw-bolder\" href=\"prihlasenie.php\">Prihlásenie</a></li>
                <li><a class=\"nav-link px-4 fw-bolder\" href=\"registracia.php\">Registrácia</a></li>";
                }
                ?>
                <?php
                if ($_SESSION['admin'] == "2") {
                    echo "<li><a class=\"nav-link px-4 fw-bolder\"  href=\"pouzivatelia.php\">Používatelia</a></li>";
                }
                ?>


            </ul>
        </div>
    </div>
</nav>
<!-- Body -->
<div class="body">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 h-100 justify-content-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="pt-100 ">Urel's Forum</h1>
            </div>
            <div class="row">
                <ul>
                    <li class="list-group-item d-flex justify-content-between align-items-start" style="text-align: center">
                        <div class="fw-bold col-8 text-size">Meno</div>
                        <div class="fw-bold col-2 text-size">Vymazať</div>
                        <div class="fw-bold col-2 text-size"> Admin</div>
                    </li>
                </ul>
            </div>
                <?php   include '../Models/users_template.php';
                ?>
                <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
                     <div class="ms-2 me-auto">
                         <div class="fw-bold">Subheading</div>
                         Cras justo odio
                     </div>
                     <span class="badge bg-primary rounded-pill">14</span>
                 </li>-->

        </div>
    </div>
</div> <!-- end div class body -->
</body>
</html>
