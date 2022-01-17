
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Forum" />
  <meta name="author" content="Aurel Kubacka" />
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
        <h2 class="h2-login fw-bolder">Registrácia</h2>
      </div>
      <div class="container pb-5">
        <div class="row d-flex justify-content-center align-items-center pb-2">
          <div class="col-md-4">
            <label>Meno</label>
            <input id="user-name" type="text" class="form-control login-input" placeholder="Zadajte vaše prihlasovacie meno">
          </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-4">
            <label >Heslo:</label>
            <input id = "password" type="password" class="form-control login-input" placeholder="Zadajte vaše heslo">
          </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-4">
            <label>Zadajte znovu heslo:</label>
            <input id = "confirm-password" type="password" class="form-control login-input" placeholder="Zadajte znovu vaše heslo">
          </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-4">
            <button class="btn-css login-btn btn btn-secondary" onclick="addUser()">Vytvoriť účet</button>

          </div>
        </div>
      </div>
      <div class="col-lg-8 align-self-baseline ptt">
        <p class="text-css mb-5">
Na našom fóre sa môžete zapojiť do tých najzaujímavejších tém po celom Slovensku. Ak u nás tému nenájdete, môžete tému sami vytvoriť.
        </p>
        <div class="alert-css fw-bolder pb-3">
          Do fóra sa môžu zapojiť len ľudia nad 18 rokov!
        </div>


      </div>
    </div>
  </div>
</div> <!-- end div class body -->
</body>
</html>
