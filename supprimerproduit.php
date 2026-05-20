<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");

$id = $_GET['id'];

$conn->query("DELETE FROM produit WHERE id=$id");

header("Location: produit.php");
?>
