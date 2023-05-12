<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=nom_de_la_base_de_donnees', 'nom_utilisateur', 'mot_de_passe');

// Récupération des valeurs du formulaire
$name = $_POST['name'];
$reference = $_POST['reference'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// Requête SQL pour insérer le nouveau produit
$sql = "INSERT INTO Produits (NameProd, ReferenceProd, QuantityProd, PriceProd) VALUES (:name, :reference, :quantity, :price)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
	'name' => $name,
	'reference' => $reference,
	'quantity' => $quantity,
	'price' => $price
]);

// Redirection vers la page d'accueil
header('Location: index.php');
exit();
?>
