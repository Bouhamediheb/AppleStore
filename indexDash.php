<?php


include_once 'connectDB.php';
include_once 'checkLogin.php';

if(isset($_SESSION['user_id'])) {
  $CIN = $_SESSION['user_id'];
  $conn = mysqli_connect("localhost", "root", "root", "DataBaseProjetWeb");
  if (!$conn) {
      die("Erreur de connexion : " . mysqli_connect_error());
  }
  $sql = "SELECT * FROM Users WHERE CIN = $CIN";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      

      $_SESSION['userName'] = $row['Name'];
      $_SESSION['userLastName'] = $row['LastName'];
      $_SESSION['userEmail'] = $row['email'];
      $_SESSION['userCIN'] = $row['CIN'];
      $_SESSION['admin'] = $row['Role'];

      $userName=$row['Name'];
      $userLastName=$row['LastName'];


      

  } else {
      echo "Aucun résultat trouvé";
  }
  mysqli_close($conn);
} else {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="Dashboard/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--link css -->

    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="Dashboard/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="Dashboard/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="Dashboard/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="Dashboard/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="Dashboard/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href=/Dahsboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="Dashboard/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="Dashboard/assets/vendor/js/helpers.js"></script>

   
    <script src="Dashboard/assets/js/config.js"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo justify-content-md-center">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="images/apple.png" alt="Brand Logo" class="img-fluid" height="40" width="40" />
              

                 
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Accueil</div>
              </a>
            </li>

            


            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Outils</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle ">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Parametres du compte</div>
              </a>
              
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle insideBorder">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Changer votre mot de passe</div>
              </a>
              
            </li>
            
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Produits</span></li>
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle insideBorder">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Liste des articles</div>
              </a>
              
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Ajouter un produit</div>
              </a>
              
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link insideBorder">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Modifier un produit</div>
              </a>
            </li>

            <li class="menu-item insideBorder">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Supprimer un produit</div>
              </a>

          
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="javascript:void(0);"
                target=""
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="javascript:void(0);"
                target=""
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Log out">Se déconnecter</div>
              </a>
          </ul>
        </aside>
     
        <div class="layout-page">

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
               

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="Dashboard/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <?php
                            if (isset($_SESSION['admin'])) {
                              echo "<h6 class='mb-0'> $userName $userLastName</h6>";
                              echo '<span class="text-muted">
                              <i class="bx bx-badge-check me-1"></i>Online</span>';
                            } 
                            

                            
                           
                            ?>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item " href="javascript:void(0);" >
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Profil</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" >
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Parametres</span>
                      </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-log-out me-2"></i>
                        <span class="align-middle">Se déconnecter</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

 
  

          <div id="content"></div>



            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
 

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="dashboardScript.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
  </body>

  <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Bouhamed Iheb , Elloumi Ahmed , Abdelmoula Khadija
                </div>
              
              </div>
            </footer>
</html>
