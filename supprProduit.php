<?php
//include 
include 'connectDB.php';
include 'checkLogin.php';

// Get Products(id,imageProduct,NameProd,ReferenceProd,QuantityProd,PriceProd) from Database

$query = "SELECT * FROM Products";
$result = mysqli_query($conn, $query);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);







?>
<DOCTYPE html>
<html>

<head>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap CSS and JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



  <!--link css -->

  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="Dashboard/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

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


  <div class="content-wrapper">


    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-lg-12 mb-4 order-0 padding-left: 2px !important;">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">Bienvenue Iheb !</h5>
                  <p class="mb-4">
                    Voici votre panneau de configuration de <span class="fw-bold">Apple Tunisie .</span> Vous pouvez ici
                    consulter les différentes commandes , les produits disponibles , les modifiers ou les supprimers.
                  </p>

                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img src="Dashboard/assets/img/illustrations/man-with-laptop-light.png" height="140"
                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png">
                </div>
              </div>
            </div>
          </div>
        </div>




      </div>
      <div class="container center_prod">
        <div class="row center_prod ">
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
            echo '<button type="button" class="btn btn-primary edit-article" data-id="' . $row['id'] . '" data-name-prod="' . $row['NameProd'] . '" data-price="' . $row['PriceProd'] . '" data-image-prod="' . base64_encode($row['imageProduct']) . '">Supprimer article</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

          }
          ?>
        </div>
      </div>

      <div class="modal fade" id="deleteArticleDialog" tabindex="-1" role="dialog"
        aria-labelledby="deleteArticleDialogLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteArticleDialogLabel">Confirmer la suppression</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Êtes-vous sûr de vouloir supprimer cet article ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>

      $(document).ready(function () {
        $('.delete-article').click(function () {
          var id = $(this).data('id');
          $('#deleteArticleDialog').modal('show');
          $('#confirmDeleteBtn').click(function () {
            $.ajax({
              type: 'POST',
              url: 'deleteProduit.php',
              data: { id: id },
              success: function (response) {
                $('#deleteArticleDialog').modal('hide');
                alert('L\'article a été supprimé avec succès !');
                location.reload();
              }
            });
          });
        });
      });

    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="dashboardScript.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Bootstrap CSS and JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>

</html>