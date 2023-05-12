<?php
//include 
include 'connectDB.php';

// Get Products(id,imageProduct,NameProd,ReferenceProd,QuantityProd,PriceProd) from Database

$query = "SELECT * FROM Products";
$result = mysqli_query($conn, $query);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);







?>
<!DOCTYPE html>
<html>

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
<div class="content-wrapper">
  

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0 padding-left: 2px !important;">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Bienvenue  Iheb !</h5>                          <p class="mb-4">
                            Voici votre panneau de configuration de <span class="fw-bold">Apple Tunisie .</span> Vous pouvez ici consulter les différentes commandes , les produits disponibles , les modifiers ou les supprimers.
                          </p>

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img src="Dashboard/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                
            
                
              </div>
          <div class="container center_prod">
  <div class="row center_prod">
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
  echo '<button type="button" class="btn btn-primary edit-article" data-id="' . $row['id'] . '" data-name-prod="' . $row['NameProd'] . '" data-price="' . $row['PriceProd'] . '" data-image-prod="' . base64_encode($row['imageProduct']) . '">Modifier article</button>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
?>
  </div>
</div>
<div class="modal fade" id="editArticleDialog" tabindex="-1" role="dialog" aria-labelledby="editArticleDialogLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editArticleDialogLabel">Modifier l'article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editArticleForm">
          <input type="hidden" id="editArticleId" name="id" value="">
          <div class="form-group">
            <label for="editArticleName">Nom de l'article</label>
            <input type="text" class="form-control" id="editArticleName" name="name" value="" required>
          </div>
          <div class="form-group">
            <label for="editArticlePrice">Prix de l'article</label>
            <input type="number" class="form-control" id="editArticlePrice" name="price" value="" required>
          </div>
          <div class="form-group">
            <label for="editArticleImage">Image de l'article</label>
            <input type="file" class="form-control" id="editArticleImage" name="image" accept="image/*">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="saveChangesBtn">Enregistrer les modifications</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
  $('.edit-article').click(function() {
    var id = $(this).data('id');
    var name = $(this).data('name-prod');
    var price = $(this).data('price');
    var image = $(this).data('image-prod');
    $('#editArticleId').val(id);
    $('#editArticleName').val(name);
    $('#editArticlePrice').val(price);
    $('#editArticleImagePreview').attr('src', 'data:image/png;base64,' + image);
    $('#editArticleDialog').modal('show');
  });
  $('#saveChangesBtn').click(function() {
    var formData = new FormData(document.getElementById('editArticleForm'));
    $.ajax({
      type: 'POST',
      url: 'modifierProduit.php',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#editArticleDialog').modal('hide');
        $('#successMessage').show().delay(3000).fadeOut();

        location.reload();
      }
      
    });

  });
});
</script>
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
    
</body>
</html>
