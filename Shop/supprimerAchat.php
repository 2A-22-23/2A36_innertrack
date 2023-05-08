<?php
include_once "connectionDB.php";

if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $stmt = $con->prepare("DELETE FROM achat WHERE id_achat = ?");
    $stmt->execute([$delete_id]);
}

header("Location: liste_achat.php");
exit;
?>