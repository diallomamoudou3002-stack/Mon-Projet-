<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");

// Vérifier si ID existe
if (!isset($_GET['id'])) {
    header("Location: categorie.php");
    exit();
}

$id = $_GET['id'];

// Récupérer categorie
$sql = "SELECT * FROM categorie WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$categorie = $result->fetch_assoc();


if (!$categorie) {
    echo "categorie introuvable";
    exit();
}

// Mise à jour categorie
if (isset($_POST['update'])) {

    $nom = $_POST['nom'];
    $id = $_POST['id'];

    $sql = "UPDATE categorie 
        SET nom=?, 
        WHERE id=?";


$stmt = $conn->prepare("UPDATE categorie SET nom=? WHERE id=?");
$stmt->bind_param("si", $nom, $id);
$stmt->execute();


    header("Location: categorie.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Modifier categorie</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h2>Modifier une categorie</h2>

<form method="POST">

<div class="row">
    
    <div class="col-md-6 mb-3">
        <label>Nom du categorie</label>
        <input type="text" name="nom" class="form-control"
               value="<?= $categorie['nom'] ?>" required>
    </div>


</div>


</div>

<button type="submit" name="update" class="btn btn-primary">
                            Enregistrer la categorie modifier
                        </button>

<a href="categorie.php" class="btn btn-secondary">Retour</a>

</form>

</body>
</html>
<?php

$conn = new mysqli("localhost", "root", "", "ecommerce");

if ($conn->connect_error) {
    die("Erreur connexion");
}

if(isset($_POST['ajouter'])){

    $nom = $_POST['nom'];

    $sql = "INSERT INTO categorie(nom) VALUES('$nom')";

    if($conn->query($sql)){
        echo "Categorie ajoutée avec succès";
    } else {
        echo "Erreur lors de l'ajout";
    }
}
?>

