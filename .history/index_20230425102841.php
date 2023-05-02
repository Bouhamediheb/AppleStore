<?php

include 'connectDB.php';
include 'checkLogin.php';

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['user_id']) && isset($_SESSION['userName'])) {
  $userName = $_SESSION['userName'];
} else {
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Iheb Apple Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/b04f244140.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

  <nav class="navbar navbar-dark navbar-expand-sm bg-dark">
    <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
          class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav flex-grow-1 justify-content-between">
          <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i
                class="fa fa-apple apple-logo"></i></a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#">iMac</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#">iPhone</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#">iPads</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#">iWatch</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#">Apple Tv</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i></a>
          </li>


          <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i class="fa fa-user"> <span></span>
                </i>
                <?php echo $_SESSION['userName']; ?>
              </a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i
                  class="fa fa-sign-out"></i></a></li>
          <?php else: ?>
            <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i
                  class="fa fa-sign-in"></i></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="register.php"><i
                  class="fa fa-user-plus"></i></a></li>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>


  <div class="container-fluid bg-white text-light py-5 text-center">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <h1 class="display-4 text-dark fw-bold">Bientôt en Tunisie ..</h1>
        <p class="lead text-dark">Soyez au rendez-vous pour voir nos derniers iPhones 15 dans une expérience innovante à
          l'Institut International de Technologie NAPU Sfax.</p>
      </div>

      <div class="container-fluid bg-white text-light py-3 text-center">

      </div>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <img src="images/appleSetup.png" class="img-fluid">
        </div>

        <div class="container-fluid bg-white text-light py-3 text-center"></div>


     

        <div class="container-fluid bg-dark text-light py-5 text-center" style="background-color:black !important;">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <h1 class="display-4">iPhone 12</h1>
              <p class="lead">La créme de la créme des iPhones.</p>
              <a href="index.php" class="btn btn-lg text-light">Voir en détail</a>
              <a href="index.php" class="btn btn-lg text-primary">Acheter</a>

            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mx-auto">
              <img src="images/iphone122.png" class="img-fluid">
            </div>
          </div>
        </div>

        <div class="container-fluid bg-white text-light py-5 text-center">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <h1 class="display-4 text-dark">iPhone 14</h1>
              <p class="lead text-dark">Le prestigieux</p>
              <a href="index.php" class="btn btn-lg text-dark">Voir en détail</a>
              <a href="index.php" class="btn btn-lg text-primary">Acheter</a>

            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mx-auto">
              <img src="images/iphone14.png" class="img-fluid">
            </div>
          </div>
        </div>

        <div class="container-fluid bg-white text-light py-5 text-center">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <h1 class="display-5 text-dark font-weight-bold">Quel produit apple vous vient ?
              </h1>
             

            </div>
          </div>
          <div class="row">
           
          </div>
        </div>

        <div class="container center_prod">
          <div class="row center_prod justify-content-md-center">
            <?php
            $conn = mysqli_connect("localhost", "root", "root", "DataBaseProjetWeb");
            $sql = "SELECT * FROM Products";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="col-md-3 mb-2 px-5">';
              echo '<div class="px-2" style="display:table-cell; vertical-align:middle; text-align:center">';
              echo '<td>' . '<img src="data:image/png;base64,' . base64_encode($row['imageProduct']) . '" width=100" height="100" />' . '</td>';
              echo '<div class="card-body">';
              echo '<h5 class="card-title text-dark">' . $row['NameProd'] . '</h5>';
              echo '<p class="card-text text-dark">Prix:' . $row['PriceProd'] . '</p>';
              echo '<button type="button" class="btn btn-primary">Ajouter au panier</button>';
              echo '</div>';
            
              echo '</div>';
              echo '</div>';
              


            }


            ?>
          </div>
        </div>







        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/b04f244140.js" crossorigin="anonymous"></script>


</body>






<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
  <hr class="my-0">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div class="me-5 d-none d-lg-block px-4">
      <span>Suivez nous sur nos réseaux sociaux.</span>
    </div>

    <div>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>

  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Apple Tunisie
          </h6>
          <div class="d-flex justify-content-center ">
            <div class="me-2 mx-4">
             
              <p>
                <img src="images/apple.png" class="img-fluid" alt="apple" width="50px" height="50px">

          </div>
          </div>  
              </

          <p>
          Découvrez les innovations Apple. Achetez les iPhone, iPad ou Mac, et explorez accessoires, divertissements et assistance.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Produits
          </h6>
          <p>
            <a href="#!" class="text-reset">iPhone</a>
          </p>
          <p>
            <a href="#!" class="text-reset">iPad</a>
          </p>
          <p>
            <a href="#!" class="text-reset">iMac</a>
          </p>
          <p>
            <a href="#!" class="text-reset">AirPods</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Liens rapides
          </h6>
          <p>
            <a href="#!" class="text-reset">Taxes et Facturations</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Assistance</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Commandes</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Forum</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Nous Contacter!</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i>Sfax , 3052 , TUNISIE</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            info@apple.tn
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> + 216 234 567 88</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> + 216 234 567 89</p>
        </div>
      </div>
    </div>
  </section>
<span>©</span>
  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Bouhamed Iheb , Elloumi Ahmed , Abdelmoula Khadija
                </div>
              </div>

</footer>



</html>