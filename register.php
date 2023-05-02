

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


    <div class="container-fluid bg-white text-light py-5 text-center" >

    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="card p-4 border-0">
        <h1 class="card-title text-center mb-4 text-dark">Créer votre compte Apple maintenant !</h1>
        <div class="mb-3"></div>

        <form method="POST" action="scriptRegister.php">

        <div class="form-floating mb-3">
            <input type="text" name="nom" class="form-control text-dark" id="nom" placeholder="Nom" required>
            <label for="nom" class="text-dark">Nom</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" name="prenom" class="form-control text-dark" id="prenom" placeholder="Prenom" required>
            <label for="prenom" class="text-dark">Prenom</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" name="tel" class="form-control text-dark" id="tel" placeholder="216-------"  required>
            <label for="tel" class="text-dark">Numéro de téléphone </label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control text-dark" id="email" placeholder="nom@apple.tn" required>
            <label for="email" class="text-dark">Adresse e-mail ou identifiant Apple</label>
          </div>


          <div class="form-floating mb-3">
            <input type="text" name="cin" class="form-control text-dark" id="cin" placeholder="12345678"  required>
            <label for="cin" class="text-dark">Numéro de Carte Identité Nationale</label>
          </div>
          
          <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control text-dark" id="password" placeholder="Mot de passe" required>
            <label for="password" class ="text-dark">Mot de passe</label>
          </div>
          
          <button type="submit" class="btn btn-primary mb-3 w-100">Créer votre compte</button>
        </form>
        <p class="mb-0 text-center text-dark">Mot de passe oublié ? <a href="#">Réinitialiser le mot de passe</a>.</p>
      </div>
    </div>
    
    
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b04f244140.js" crossorigin="anonymous"></script>



</body>
 <footer class="container-fluid text-center">
    <p>Footer Text</p>
  </footer>

</html>











 

