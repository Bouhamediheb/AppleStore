<?php
// Start session
session_start();
include 'connectDB.php';
include 'checkLogin.php';

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['user_id']) && isset($_SESSION['userName'])) {
  $userName = $_SESSION['userName'];
  $role = $_SESSION['admin'];
} else {

}

$total = 0;




?>

<!DOCTYPE html>
<html>
<head>

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
    <div class="container">
      <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
      </button>
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

          <?php if (isset($_SESSION['user_id'])): ?>
    <li class="nav-item dropdown" role="presentation">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> <?php echo $_SESSION['userName']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="ChangePasswordUser.php">Changer votre adresse email</a>
            <a class="dropdown-item" href="ChangePasswordUser.php">Changer votre mot de passe</a>

        </div>
    </li>
    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i></a></li>
<?php else: ?>
    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link" href="register.php"><i class="fa fa-user-plus"></i></a></li>
<?php endif; ?>

          <?php if (isset($_SESSION['user_id']) && $role == 1): ?>
            <li class="nav-item" role="presentation"><a class="nav-link" href="indexDash.php"><i
                  class="fa fa-cog"></i></a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>

  </nav>

  <div class="container-fluid bg-white text-light py-3 pt-3 text-center">
  <div class="col-md-6 mx-auto">
        <h1 class="display-4 text-dark fw-bold">Votre panier</h1>
        <p class="lead text-dark">Veuillez vérifier la liste des articles dans le tableau avant de confirmer votre commande</p>
      </div>
    <?php if (!empty($_SESSION["cart"])) { ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Nom du produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Totale</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION["cart"] as $item) {
                    $total_item = $item["price"] * $item["quantity"];
                    $total += $total_item;
                ?>
                    <tr>
                        <?php if ($item['image']): ?>
                            <td><img src="data:image/png;base64,<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="max-width: 100px; max-height: 100px;"></td>
                        <?php else: ?>
                            <td>No image available</td>
                        <?php endif; ?>
                        <td><?= $item["name"] ?></td>
                        <td><?= $item["price"] ?></td>
                        <td><?= $item["quantity"] ?></td>
                        <td><?= $total_item ?></td>
                        <td><a href='suppPanier.php?id=<?= $item["id"] ?>'>Supprimer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                    <td colspan="2"><?= $total ?> TND</td>
                </tr>
                <tr>
                    <td colspan="6">
                        <form action="" method="post">
                            <input type="hidden" name="commande" value="1">
                            <button type="submit" class="btn btn-primary float-right">Commande</button>
                        </form>
                    </td>
                </tr>
                <?php if (isset($_POST["commande"])) {
                    // Insérer la requête SQL pour enregistrer la commande dans la base de données
                    // vérifier si user is logged
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $sql = "INSERT INTO commande (user_id, total) VALUES ('$user_id', '$total')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $commande_id = mysqli_insert_id($conn);
                            foreach ($_SESSION["cart"] as $item) {
                                $product_id = $item['id'];
                                $quantity = $item['quantity'];
                                $sql = "INSERT INTO commande_produit (commande_id, product_id, quantity) VALUES ('$commande_id', '$product_id', '$quantity')";
                                $result = mysqli_query($conn, $sql);
                            }
                            if ($result) {
                                echo "<script>alert('Votre commande a été enregistrée avec succès.')</script>";
                                unset($_SESSION["cart"]);
                                echo "<script>window.location = 'index.php'</script>";
                            }
                        }
                    } else {
                        echo "<script>alert('Veuillez vous connecter pour passer une commande.')</script>";
                        echo "<script>window.location = 'login.php'</script>";
                    }
                } ?>
            </tfoot>
        </table>
    <?php } else { ?>
        <p>Votre panier est vide. Commencer par ajouter quelques produits.</p>
    <?php } ?>
</div>


	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          </ <p>
          Découvrez les innovations Apple. Achetez les iPhone, iPad ou Mac, et explorez accessoires, divertissements et
          assistance.
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
