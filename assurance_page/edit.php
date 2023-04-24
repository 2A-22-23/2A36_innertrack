<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM liste WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['mail'])  && isset($_POST['type_assurance'])  && isset($_POST['dateEffet'])  && isset($_POST['dateExpiration']) ) {
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $type_assurance = $_POST['type_assurance'];
    $dateEffet = $_POST['dateEffet'];
    $dateExpiration = $_POST['dateExpiration'];
  $sql = 'UPDATE liste SET name=:name, mail=:mail, type_assurance=:type_assurance, dateEffet=:dateEffet, dateExpiration=:dateExpiration WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':mail' => $mail, ':type_assurance' => $type_assurance, ':dateEffet' => $dateEffet, ':dateExpiration' => $dateExpiration, ':id' => $id])) {
    header("Location: index.php");
  }

  

}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Assuranace</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="mail">Email</label>
          <input type="mail" value="<?= $person->mail; ?>" name="mail" id="mail" class="form-control">
        </div>
        <div class="form-group">
        <label for="type_assurance">Type assurance</label>
          <input value="<?= $person->type_assurance; ?>" type="text" name="type_assurance" id="type_assurance" class="form-control">
        </div>
        <div class="form-group">
        <label for="dateEffet"> dateEffet</label>
          <input value="<?= $person->dateEffet; ?>" type="date" name="dateEffet" id="dateEffet" class="form-control">
        </div>
        <div class="form-group">
        <label for="dateExpiration">dateExpiration </label>
          <input value="<?= $person->dateExpiration; ?>" type="date" name="dateExpiration" id="dateExpiration" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update Assurance</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>