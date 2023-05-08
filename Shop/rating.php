<?php
session_start();
include("connectionDB.php");

$idUser = $_SESSION['id_user'];
$rate = $_POST['rate'];
$id_article = $_POST['id_article'];



// Prepare the SQL statement with placeholders
$sql = 'SELECT COUNT(*) FROM rating WHERE id_article = :id_article AND id_user = :id_user';

// Bind the parameters with their values


$stmt = $con->prepare($sql);
$stmt->bindParam(':id_article', $id_article);
$stmt->bindParam(':id_user', $idUser);

// Execute the query and retrieve the count
$stmt->execute();
$count = $stmt->fetchColumn();

if ($count > 0) {
    $stmt = $con->prepare("UPDATE rating SET rate = :rate WHERE id_user = :id_user AND id_article = :id_article");
    $stmt->bindParam(':rate', $rate);
    $stmt->bindParam(':id_user', $idUser); // replace with your own logic for identifying the item being rated
    $stmt->bindParam(':id_article', $id_article); 
    $stmt->execute();
} else {
    $stmt = $con->prepare("INSERT INTO rating (id_user, id_article, rate) VALUES (:id_user, :id_article, :rate)");
    $stmt->bindParam(':rate', $rate);
    $stmt->bindParam(':id_user', $idUser); // replace with your own logic for identifying the item being rated
    $stmt->bindParam(':id_article', $id_article); 
    $stmt->execute();
}





?>