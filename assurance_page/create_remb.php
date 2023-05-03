<?php
require 'db1.php';

$message = '';

if (isset($_POST['email']) && isset($_POST['dateRemboursement']) && isset($_POST['status']) && isset($_POST['menton']) && isset($_POST['type_assurance'])&& isset($_POST['id'])) {
  $email = $_POST['email'];
  $dateRemboursement = $_POST['dateRemboursement'];
  $status = $_POST['status'];
  $menton = $_POST['menton'];
  $id = $_POST['id'];
  $type_assurance = $_POST['type_assurance'];
  $sql = 'INSERT INTO remboursement (email, dateRemboursement, status, menton,type_assurance,id) VALUES (:email, :dateRemboursement, :status, :menton,:type_assurance,:id)';
  $statement = $connection->prepare($sql);

  if ($statement->execute([':email' => $email, ':dateRemboursement' => $dateRemboursement, ':status' => $status, ':menton' => $menton , ':type_assurance' => $type_assurance, ':id' => $id])) 
  {
    $message = 'Data inserted successfully';
  } 

}

?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Ajouter remboursement</h2>
    </div>
    <div class="card-body">
      <?php if (!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="menton">Montons</label>
          <input type="text" name="menton" id="menton" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <input type="text" name="status" id="status" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="dateRemboursement">Date de Remboursement</label>
          <input type="date" name="dateRemboursement" id="dateRemboursement" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="dateRemboursement">Date de Remboursement</label>
          <select type="type_assurance" name="type_assurance" id="type_assurance" class="form-control" required>
            <option >MAx</option>
            <option >average</option>
            <option >Min</option></select>
        </div>
        <div class="form-group">
          <label for="id">id </label>
          <input type="number" name="id" id="id" class="form-control" required>
         </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Ajouter remboursement</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>