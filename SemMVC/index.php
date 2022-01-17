<?php
session_start();
$_SESSION['id'] = "";
$_SESSION['admin'] = "";

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
    <link href="../SemMVC/App/Views/styles.css" rel="stylesheet" />

    <!-- javaScript -->
    <script src="../SemMVC/App/Controllers/script.js"></script>


    <!-- JQUERY load -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body id="page-top">

<!-- Body -->
<div class="body">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 h-100 justify-content-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="pt-100 ">Urel's Forum</h1>
            </div>
            <div class="col-lg-8 align-self-baseline" style="padding-top: 70px;">
                <p class="text-css mb-5">
                    Na našom fóre sa môžete zapojiť do tých najzaujímavejších tém po celom Slovensku. Ak u nás tému nenájdete, môžete tému sami vytvoriť. Stačí vám veľmi rýchla registrácia a môžte odovzdať váš názor na danú tému ostatným.
                </p>
                <div class="alert-css fw-bolder pb-3">
                    Do fóra sa môžu zapojiť len ľudia nad 18 rokov!
                </div>
                <div class="btn-align">
                    <a class="btn-align btn btn-secondary" href="../SemMVC/App/Views/forum.php">Mám viac ako 18 rokov</a>
                    <a class="btn-align btn btn-secondary" href="https://www.google.com/">Nemám, chcem odísť</a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end div class body -->
</body>
</html>