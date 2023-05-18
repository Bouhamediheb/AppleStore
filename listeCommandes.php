
<?php
include_once 'connectDB.php';
include_once 'checkLogin.php';


?>
<DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
    </div>
  </div>
  <div class="container">
    <h2>Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>View Order Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
           
            // Retrieve orders from the database
            $orderSql = "SELECT * FROM `Order`";
            $result = mysqli_query($conn, $orderSql);

            // Loop through each order and display in table rows
            while ($row = mysqli_fetch_assoc($result)) {
                $orderId = $row['order_id'];
                $orderDate = $row['order_date'];
            ?>
                <tr>
                    <td><?= $orderId ?></td>
                    <td><?= $orderDate ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#orderModal<?= $orderId ?>">
                            View Details
                        </button>
                    </td>
                </tr>
                <!-- Modal for order details -->
                <div class="modal fade" id="orderModal<?= $orderId ?>" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderModalLabel">Order Details - <?= $orderId ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Retrieve order lines for the current order
                                        $orderLineSql = "SELECT * FROM OrderLine WHERE order_id = $orderId";
                                        $orderLineResult = mysqli_query($conn, $orderLineSql);

                                        // Loop through each order line and display in table rows
                                        while ($orderLineRow = mysqli_fetch_assoc($orderLineResult)) {
                                            $productId = $orderLineRow['product_id'];
                                            $quantity = $orderLineRow['quantity'];

                                            // Retrieve product details from another table (adjust the table and column names as per your schema)
                                            $productSql = "SELECT * FROM Products WHERE id = $productId";
                                            $productResult = mysqli_query($conn, $productSql);
                                            $productRow = mysqli_fetch_assoc($productResult);
                                            $productName = $productRow['name'];
                                        ?>
                                            <tr>
                                                <td><?= $productId ?></td>
                                                <td><?= $productName ?></td>
                                                <td><?= $quantity ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>




    
      


     <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="Dashboard/assets/vendor/libs/popper/popper.js"></script>
    <script src="Dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="dashboardScript.js"></script>

    <script src="Dashboard/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="Dashboard/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="Dashboard/assets/js/main.js"></script>

    <!-- Page JS -->

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    

</body>

</html>