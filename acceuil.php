<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Produits</title>
    <H2>Bienvenue dans notre acceuil</H2>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }

        .hero{
            color:white;
            text-align:center;
            padding-top:120px;
        }

        .card{
            border:none;
            border-radius:15px;
            transition:0.3s;
        }

        .card:hover{
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Gestion de Produit</a>

    <div>
        <a class="btn btn-outline-light me-2" href="produit.php">Produits</a>
        <a class="btn btn-outline-light" href="categorie.php">Catégorie</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<div class="hero">
    <h1 class="display-4 fw-bold">Bienvenue 👋</h1>
    <p class="lead">Système de gestion de produits simple et efficace</p>
</div>

<!-- CARTES -->
<div class="container mt-5">
    <div class="row">

        <div class="col-md-4">
            <div class="card shadow p-4 text-center">
                <h3>📦 Produits</h3>
                <p>Ajouter, modifier et supprimer vos produits facilement.</p>
                <a href="produit.php" class="btn btn-primary">Gérer</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-4 text-center">
                <h3>🗂 Catégories</h3>
                <p>Organisez vos produits par catégories.</p>
                <a href="categorie.php" class="btn btn-success">Gérer</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-4 text-center">
                <h3>➕ Ajouter</h3>
                <p>Ajoutez rapidement un nouveau produit.</p>
                <a href="addProduit.php" class="btn btn-warning">Ajouter</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>