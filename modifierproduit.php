<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");
 

// Vérifier si ID existe
if (!isset($_GET['id'])) {
    header("Location: produit.php");
    exit();
}

$id = $_GET['id'];

// Récupérer produit
$sql = "SELECT * FROM produit WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$produit = $result->fetch_assoc();


if (!$produit) {
    echo "Produit introuvable";
    exit();
}

// Mise à jour produit
if (isset($_POST['update'])) {

    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];

    $sql = "UPDATE produit 
        SET nom=?, categorie=?, description=?, prix=?, quantite=? 
        WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssiii", $nom, $categorie, $description, $prix, $quantite, $id);
$stmt->execute();

    header("Location: produit.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Modifier produit</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h2>Modifier un produit</h2>

<form method="POST">

<div class="row">
    
    <div class="col-md-6 mb-3">
        <label>Nom du produit</label>
        <input type="text" name="nom" class="form-control"
               value="<?= $produit['nom'] ?>" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Catégorie</label>
        <input type="text" name="categorie" class="form-control"
               value="<?= $produit['categorie'] ?>" required>
    </div>

</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control"><?= $produit['description'] ?></textarea>
</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label>Prix</label>
        <input type="number" name="prix" class="form-control"
               value="<?= $produit['prix'] ?>" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Quantité</label>
        <input type="number" name="quantite" class="form-control"
               value="<?= $produit['quantite'] ?>" required>
    </div>

</div>

<button type="submit" name="update" class="btn btn-primary">
                            Enregistrer le produit modifier
                        </button>

<a href="produit.php" class="btn btn-secondary">Retour</a>

</form>

</body>
</html>


