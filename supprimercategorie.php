<?php
$conn = new mysqli("localhost", "root", "", "ecommerce");

$id = $_GET['id'];

$conn->query("DELETE FROM categorie WHERE id=$id");

header("Location: categorie.php");
?>
