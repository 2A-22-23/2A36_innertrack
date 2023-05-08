<?php
session_start();
/*$_SESSION["login"]="amen";
$login = $_SESSION["login"];*/
?>
<?php
include_once "connectionDB.php";
$id_achat = $_POST['id_achat'];
$confirmation = $_POST['confirmation'];
$sql = "UPDATE achat SET confirmation = :confirmation WHERE id_achat = :id_achat";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_achat', $id_achat, PDO::PARAM_INT);
$stmt->bindParam(':confirmation', $confirmation, PDO::PARAM_INT);
$stmt->execute();









 

// Set recipient email address and subject
$to = "oussamabelhwichet@gmail.com";
$subject = "Demand Confirmation";

// Set email message body
$message = "Dear client,\r\n\r\nThank you for submitting your demand. We would like to inform you  that your demand has been confirmed.\r\n\r\nBest regards,\r\nYour InnerTrack";

// Set headers
$headers = "From: amenallah.belouichet@gmail.com\r\n";
$headers .= "Reply-To: amenallah.belouichet@gmail.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
if(mail($to, $subject, $message, $headers)){
    echo "Email envoyé à " . $to;
} else {
    echo "Erreur d'envoi.";
}

// Output success message
?>