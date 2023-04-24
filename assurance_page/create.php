<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['mail'])  && isset($_POST['type_assurance'])  && isset($_POST['dateEffet'])  && isset($_POST['dateExpiration']) ) {
  $name = $_POST['name'];
  $mail = $_POST['mail'];
  $type_assurance = $_POST['type_assurance'];
  $dateEffet = $_POST['dateEffet'];
  $dateExpiration = $_POST['dateExpiration'];
  $sql = 'INSERT INTO liste(name, mail, type_assurance, dateEffet, dateExpiration) VALUES(:name, :mail, :type_assurance, :dateEffet, :dateExpiration)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':mail' => $mail, ':type_assurance' => $type_assurance, ':dateEffet' => $dateEffet, ':dateExpiration' => $dateExpiration])) {
    $message = 'data inserted successfully';
  }
  
  

}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create Assurance</h2>
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
          <input type="text" name="name" id="name" class="form-control" Required>
        </div>
        <div class="form-group">
          <label for="mail">Email</label>
          <input type="mail" name="mail" id="mail" class="form-control" Required> 
        </div>
        <div class="form-group">
          <label for="type_assurance">Type assurance</label>
          <input type="text" name="type_assurance" id="type_assurance" class="form-control" Required>
        </div>
        <div class="form-group">
          <label for="dateEffet"> dateEffet</label>
          <input type="date" name="dateEffet" id="dateEffet" class="form-control" required>
         </div>
         <div class="form-group">
          <label for="dateExpiration">dateExpiration </label>
          <input type="date" name="dateExpiration" id="dateExpiration" class="form-control" required>
         </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create Assurance</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>