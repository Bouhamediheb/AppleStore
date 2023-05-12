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

              <div class="container col-lg-12" style="padding-left:1px; !important; padding-right:1px; !important;">
		<form method="post" action="ajoutProduit.php" enctype="multipart/form-data">
			
			<div class="card mt-2 col-lg-12" style="padding-left:0px; !important;">
				<div class="card-header">
					<h4>Veuillez remplir les champs :</h4>
				</div>
				<div class="card-body">
                <div class="form-group pb-3">
						<label for="name">Nom du produit</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="form-group pb-3">
						<label for="reference">Référence du produit</label>
						<input type="text" class="form-control" id="reference" name="reference" required>
					</div>
					<div class="form-group pb-3">
						<label for="quantity">Quantité du produit</label>
						<input type="number" class="form-control" id="quantity" name="quantity" required>
					</div>

					<div class="form-group pb-3">
						<label for="price">Prix du produit</label>
						<input type="number" class="form-control" id="price" name="price" step="0.01" required>
					</div>

                    <div class="form-group pb-3">
						<label for="image">Image du produit</label><br>
						<input type="file" class="form-control-file" id="image" name="image">
				</div>
                <button type="submit" class="btn btn-primary mt-3">Ajouter le produit</button>

				</div>

                
				
				</div>
			</div>
		</form>
	</div> 
             
            </div>

            
          </div>
