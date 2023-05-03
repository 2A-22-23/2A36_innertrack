<?php
require 'db1.php';
$idR = $_GET['idR'];
$sql = 'SELECT * FROM remboursement WHERE idR=:idR';
$statement = $connection->prepare($sql);
$statement->execute([':idR' => $idR ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['email']) && isset($_POST['dateRemboursement']) && isset($_POST['status']) && isset($_POST['menton']) && isset($_POST['type_assurance'])) {
    $email = $_POST['email'];
    $dateRemboursement = $_POST['dateRemboursement'];
    $status = $_POST['status'];
    $menton = $_POST['menton'];
    $type_assurance = $_POST['type_assurance'];
    
  $sql = 'UPDATE remboursement SET =:email, status=:status, type_assurance=:type_assurance, dateRemboursement=:dateRemboursement, menton=:menton WHERE idR=:idR';
  $statement = $connection->prepare($sql);
  
  if ($statement->execute([':email' => $email, ':status' => $status,':type_assurance' => $type_assurance, ':dateRemboursement' => $dateRemboursement, ':menton' => $menton, ':idR' => $idR])) {
    $sql = 'SELECT * FROM remboursement WHERE idR=:idR';
    $statement = $connection->prepare($sql);
    $statement->execute([':idR' => $idR ]);
    $updated_person = $statement->fetch(PDO::FETCH_OBJ);
    
  }
  
}





 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Remboursement</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
  
        <div class="form-group">
          <label for="status">Status</label>
          
          <select  type="text" name="status" id="status" class="form-control" required>
            <option >rembourse</option>
            <option >non rembourse</option>
            </select>
        </div>
        <div class="form-group">
  <label for="type_assurance">Type assurance</label>
  <select type="text" name="type_assurance" id="type_assurance" class="form-control" required>
    <option value="MAx" <?php if ($person->type_assurance == 'MAx') echo 'selected'; ?>>MAx</option>
    <option value="average" <?php if ($person->type_assurance == 'average') echo 'selected'; ?>>average</option>
    <option value="Min" <?php if ($person->type_assurance == 'Min') echo 'selected'; ?>>Min</option>
  </select>
</div>
        <div class="form-group">
        <label for="dateRemboursement"> dateEffet</label>
          <input value="<?= $person->dateRemboursement; ?>" type="date" name="dateRemboursement" id="dateRemboursement" class="form-control">
        </div>
       <!-- <div class="form-group">
        <label for="id"> idliste</label>
          <input value="" type="number" name="id" id="id" class="form-control">
        </div>-->
        <span class="item-no" style="background-color: #AFD9EA5c;"></span>
        <div class="form-group">
        <button type="submit" class="btn btn-info">Update Assurance</button>
        </div>
        
                                                                    
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>