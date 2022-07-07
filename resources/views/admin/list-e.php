<?php
include "connexion.php";

if(isset($_GET['identreprise'])){
	$identre = $_GET['identreprise'];
	$req = "DELETE FROM `entreprises` WHERE id_entreprise=$identre ";
	$exec = mysqli_query($conn,$req);
}

?>
<?php include "header.php"; ?>
<!-- /.main-menu -->
<?php include "sidebar.php"; ?>


<div id="wrapper">
	<div class="main-content">
    <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Default</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else there</a></li>
							<li class="split"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
            <tr>
                <th>Logo</th>
                <th>Raison Social</th>
                <th>Ville</th>
                <th>Tél</th>
                <th>E-mail</th>
                <th>Action</th>
            </tr>
						</thead>
						<tfoot>
            <tr>
                <th>Logo</th>
                <th>Raison Social</th>
                <th>Ville</th>
                <th>Tél</th>
                <th>E-mail</th>
                <th>Action</th>
            </tr>
						</tfoot>
						<tbody>
<?php
$query = "SELECT * FROM `entreprises`";

$exec = mysqli_query($conn,$query);

while($array = mysqli_fetch_array($exec)){

?>	

                            <tr>
								<td><img src="uploads/<?php echo $array['logo']; ?>" alt="<?php echo $array['rsociale']; ?>" style="width:100px;"/></td>
								<td><?php echo $array['rsociale']; ?></td>
								<td><?php echo $array['ville']; ?></td>
								<td><?php echo $array['tel']; ?></td>
								<td><?php echo $array['email']; ?></td>
								<td>$320,800</td>
							</tr>
							
                        </tbody>
                        <?php } ?>
					</table>
</div>



<?php include "footer.php"; ?>