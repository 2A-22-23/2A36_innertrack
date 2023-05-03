<?php
require 'db1.php';
$idR= $_GET['idR'];
$sql = 'DELETE FROM remboursement WHERE idR=:idR';
$statement = $connection->prepare($sql);
if ($statement->execute([':idR' => $idR])) {
  header("Location: index.php");
}