<?php
include "connexion.php";
$msg = "";
if($_POST){


   
//2- Récuperation des variables

$libelle_o =mysqli_real_escape_string($conn,$_POST['libelle_o']);
$desc_o =mysqli_real_escape_string($conn,$_POST['desc_o']);
$experience_o =mysqli_real_escape_string($conn,$_POST['experience_o']);
$profil_o =mysqli_real_escape_string($conn,$_POST['profil_o']);
$formation_o =mysqli_real_escape_string($conn,$_POST['formation_o']);
$conditions_o =mysqli_real_escape_string($conn,$_POST['conditions_o']);
$id_e =mysqli_real_escape_string($conn,$_POST['id_e']);
$salaire =mysqli_real_escape_string($conn,$_POST['salaire']);
$location_o =mysqli_real_escape_string($conn,$_POST['location_o']);
$type_o =mysqli_real_escape_string($conn,$_POST['type_o']);
$type_contrat_o =mysqli_real_escape_string($conn,$_POST['type_contrat_o']);

$req = "INSERT INTO `offres`(`libelle_o`, `desc_o`, `experience_o`, `profil_o`, `formation_o`, `conditions_o`, `id_e`, `salaire`, `location_o`, `type_o`, `type_contrat_o`) VALUES ('".$libelle_o."','".$desc_o."','".$experience_o."','".$profil_o."','".$formation_o."','".$conditions_o."','".$id_e."','".$salaire."','".$location_o."','".$type_o."','".$type_contrat_o."')";

//echo $req;

//4- Execution de la requete
$exec = mysqli_query($conn,$req);
if($exec){
	$msg ="<div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    <strong>Well done!</strong> Votre Offre a été ajouté.
</div>";
}else{
	$msg ="<div class='alert alert-danger alert-dismissible' role='alert'> 
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    <strong>Oh snap!</strong> Offre non ajouté!!! 
</div>";
}

}
?>


<?php include "header.php"; ?>
<!-- /.main-menu -->
<?php include "sidebar.php"; ?>
<div class="content">
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-9">
				<div class="box-content card white">
					<h4 class="box-title">Ajout Offre</h4>
                    <!-- /.box-title -->
                    <p><?php echo $msg ; ?></p>
					<div class="card-content">
						<form method="POST"   enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleInputEmail1">Nom d'Offre</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer your offre nom" name="libelle_o">
                            </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Salaire</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le salaire" name="salaire">
                            </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Location</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer location" name="location_o">
                            </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Type d'offre</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer location" name="type_o">
                            </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Type de contrat</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer location" name="type_contrat_o">
                            </div>
                            <div class="m-t-20">
                            <label for="exampleInputEmail1">Description</label>
									
									<textarea name="desc_o" id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
							</div>
							<div class="m-t-20">
                            <label for="exampleInputEmail1">Experience</label>
									
									<textarea name="experience_o" id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
							</div>
							
                            <div class="m-t-20">
                            <label for="exampleInputEmail1">Formation</label>
									
									<textarea name="formation_o" id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
							</div>
							<div class="m-t-20">
                            <label for="exampleInputEmail1">Condition</label>
									
									<textarea name="conditions_o" id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
							</div>
                            </br>
                            <div class="form-group margin-bottom-20">
                            <label  for="exampleInputEmail1">Liste des entreprises</label>
							<select class="form-control" name="id_e">
							<option value="0">Liste des entreprises</option>
<?php
$query = "SELECT * FROM `entreprises`";

$exec = mysqli_query($conn,$query);

while($array = mysqli_fetch_array($exec)){

?>	
								
								<option value="<?php echo $array['id_entreprise']; ?>"><?php echo $array['rsociale']; ?></option>
								<?php } ?> 
							</select>
						</div>
							<div class="checkbox margin-bottom-20">
								<input type="checkbox" id="chk-1"><label for="chk-1">Check me out</label> 
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Submit</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			
			<!-- /.col-lg-6 col-xs-12 -->

			
			<!-- /.col-xs-12 -->
			
			<!-- /.col-lg-6 col-xs-12 -->
			
			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			
			<!-- /.col-lg-4 ol-xs-12 -->
			
			<!-- /.col-lg-4 col-xs-12 -->
			<div class="col-lg-4 ol-xs-12">
				
				<!-- /.box-content card white -->
			</div>
			<!-- /.col-lg-4 col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->		
		<footer class="footer">
			<ul class="list-inline">
				<li>2016 © NinjaAdmin.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include "footer.php"; ?>