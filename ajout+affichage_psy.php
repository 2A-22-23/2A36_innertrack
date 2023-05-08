<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Table des Patients</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #13C5DD;
		background: #abb7d4;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Psychiatres <b>Table</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addPsyModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Psychiatre</span></a>
						</div>
					</div>
				</div>

				<?php
    $con = mysqli_connect('localhost', 'root', '');
    if (!$con) {
        echo "Base de donnée introuvable";
    } 
    if (!mysqli_select_db($con, 'projet_web')) {
        echo "Base de donnée introuvable";
    }

    // Pagination
    $results_per_page = 5;
    $sql1 = "SELECT COUNT(*) as total FROM psychiatres";
    $result = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($result);
    $total_pages = ceil($row["total"] / $results_per_page);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $this_page_first_result = ($page - 1) * $results_per_page;

    $sql2 = "SELECT * from psychiatres LIMIT $this_page_first_result, $results_per_page";
    $result = mysqli_query($con, $sql2);

    if (!$result) {
        echo "Erreur d'exécution de la requête";
    } else {   
?> 

<div class="clearfix">
    <ul class="pagination">
        <?php if ($page > 1) {?>
        <li class="page-item"><a href="?page=<?php echo $page-1;?>" class="page-link">Previous</a></li>
        <?php } else { ?>
        <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
        <?php } ?>

        <?php for ($i=1; $i<=$total_pages; $i++) {?>
        <?php if ($i == $page) {?>
        <li class="page-item active"><a href="#" class="page-link"><?php echo $i;?></a></li>
        <?php } else {?>
        <li class="page-item"><a href="?page=<?php echo $i;?>" class="page-link"><?php echo $i;?></a></li>
        <?php } ?>
        <?php } ?>

        <?php if ($page < $total_pages) {?>
        <li class="page-item"><a href="?page=<?php echo $page+1;?>" class="page-link">Next</a></li>
        <?php } else {?>
        <li class="page-item disabled"><a href="#" class="page-link">Next</a></li>
        <?php } ?>
    </ul>
</div>


					<table class="table table-striped table-hover" id="dataTable">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Name Psychiatre</th>
							<th>Adresse Psychiatre</th>
							<th>Numero de téléphone</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>

						<?php while ($ligne = mysqli_fetch_array ($result )) { 

							?>
						<tr>
						<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td><?php echo $ligne ["name_psy"] ?></td>
							<td><?php echo $ligne ["adresse_psy"] ?></td>
							<td><?php echo $ligne ["numtel_psy"] ?></td>
							<td>
								<a href="#editPsyModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a onclick ="return confirm ('étes vous sùr de vouloir supprimer cette ligne ?')" href="suppression_psy.php?Numtel_psy=<?php echo $ligne ["numtel_psy"] ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>					
						</tr>
						<?php } ?>

			<!-- Export to excel -->	
				
						<button class="btn btn-primary" id="btnExport" onclick="ExportToExcel('xlsx')"><i class="far fa-file-dataTable"></i> Export To Excel</button>

   						 <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
   							 <script>
      						  function ExportToExcel(type, fn, dl) {
        					    var elt = document.getElementById('dataTable');
         						   var wb = XLSX.utils.table_to_book(elt, { sheet: "psychiatres" });
         							   return dl ?
             					   XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
               							 XLSX.writeFile(wb, fn || ('psychiatres.' + (type || 'xlsx')));
       						 }
   							 </script>

						
					</tbody>
				</table>
				<a href="../table_patient/ajout+affichage.php">Table des patients</a>

				
			</div>
		</div>        
    </div>
								
							
								<?php
							}
								?>


	<!-- Recherche Par Nom -->
	<form method="POST">
  <div class="form-group">
    <label for="name">Recherche par nom :</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Entrez le nom du patient">
  </div>
  <button type="submit" name="search" class="btn btn-primary">Rechercher</button>
	</form>
	<?php
  $con = mysqli_connect('localhost', 'root', '');
  if(!$con) {
    echo "base de données introuvable";
  }
  if (!mysqli_select_db($con, 'projet_web')) {
    echo "base de données introuvable";
  }

  if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $sql = "SELECT * FROM psychiatres WHERE name_psy LIKE '%$name%'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
      echo "erreur de l'exécution de la requête";
    } else {
      ?>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>
              <span class="custom-checkbox">
                <input type="checkbox" id="selectAll">
                <label for="selectAll"></label>
              </span>
            </th>
            <th>Name psy</th>
            <th>Adresse psy</th>
            <th>Numero de téléphone psy</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($ligne = mysqli_fetch_array($result)) { ?>
            <tr>
              <td>
                <span class="custom-checkbox">
                  <input type="checkbox" id="checkbox1" name="options[]" value="1">
                  <label for="checkbox1"></label>
                </span>
              </td>
              <td><?php echo $ligne["name_psy"] ?></td>
              <td><?php echo $ligne["adresse_psy"] ?></td>
              <td><?php echo $ligne["numtel_psy"] ?></td>
              <td>
                <a href="#editPatientModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
              </td>					
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
  <?php } ?>

	<!-- Add Modal HTML -->
	<div id="addPsyModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" >
					<div class="modal-header">						
						<h4 class="modal-title">Add Psychiatre</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="nom_psy" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Numtel</label>
							<input type="Number" min="0" name="numtel_psy" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea type="text" class="form-control" name="adresse_psy" required></textarea>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="bouton" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
   
    <?php

    $con = mysqli_connect('localhost', 'root', '');
    if(!$con){
        echo "base de donnée introuvable";
    }
    if (!mysqli_select_db($con, 'projet_web')){
        echo "base de donnée introuvable";
    }
    if(isset($_POST['nom_psy']) and isset($_POST['numtel_psy']) and isset($_POST['adresse_psy']) and isset($_POST['bouton'])){
        $nom = $_POST['nom_psy'];
		$adresse = $_POST['adresse_psy'];
        $num = $_POST['numtel_psy'];
        
        $sql = "INSERT INTO psychiatres (name_psy, adresse_psy, numtel_psy) VALUES ('$nom','$adresse','$num')";
        
        if (!mysqli_query( $con , $sql)){
            echo "le psy n est pas ajoute";
        } else {
            echo "le psy a ete bien ajoute";
        }
    }

    ?>

	<!-- Edit Modal HTML -->
	<div id="editPatientModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Patient</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Numtel</label>
							<input type="Number" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>date_de_naissance</label>
							<input type="date" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>