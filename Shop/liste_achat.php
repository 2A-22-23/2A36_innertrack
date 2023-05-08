<?php
session_start();
//$_SESSION["role"]="admin";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="assets/logo.png" />
</head>
<body>

<?php
include("menu_new.php");
include_once "connectionDB.php";

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $con->prepare("DELETE FROM achat WHERE id_achat = ?");
    $stmt->execute([$delete_id]);
}

$sql = 'SELECT * FROM achat';          
$rows = array();
foreach ($con->query($sql) as $row) {
    $rows[] = $row;
}
?>

<div>
  </div>

<table style="margin-left: 20% ; margin-top: 3%;;">
    <thead>
    <tr>
        <th>login</th>
        <th>article</th>
        <th>quantite</th>
        <th>adress</th>
        <th>telephone</th>
        <th>Action</th>
        <th>Confirmation</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($rows as $row) {
        $id_achat = $row['id_achat'];
        $id_article = $row['id_article'];
        $quantite_achat = $row['quantite_achat'];
        $adress_achat = $row['adress_achat'];
        $idUser = $row['id_user'];
        $phone_number = $row['phone_number'];
        $confirmation = $row['confirmation'];
        echo "<tr>";
        echo "<td>$idUser</td>";
        echo "<td>$id_article</td>";
        echo "<td>$quantite_achat</td>";
        echo "<td>$adress_achat</td>";
        echo "<td>$phone_number</td>";
        echo "<td>      
          <a href='liste_achat.php?delete_id=$id_achat'><img style='height:19px;' src='images/trash.png' onclick=\"return confirm('Vous voulez vraiment supprimer cet article ?');\"></a></td>";
        echo "<td><input type='checkbox' name='confirmation' value='$id_achat' onchange='updateConfirmation(this)'" . ($confirmation ? ' checked' : '') . "></td>";
        
        echo "</tr>";
    }
    
    ?>
    </tbody>
</table>

</body>

<script>
    function updateConfirmation(checkbox) {
    var id_achat = checkbox.value;
    var confirmation = checkbox.checked ? 1 : 0;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'modifierAchat.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
      }
    };
    xhr.send('id_achat=' + id_achat + '&confirmation=' + confirmation);
  }
</script>
</html>
