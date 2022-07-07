<?php
include "connexion.php";
$msg = "";
if ($_POST) {

    $n = 10;
    function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    //2- Récuperation des variables
    $rsociale = mysqli_real_escape_string($conn, $_POST['rsociale']);
    $adresse = mysqli_real_escape_string($conn, $_POST['adresse']);
    $ville = mysqli_real_escape_string($conn, $_POST['ville']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $secteur = mysqli_real_escape_string($conn, $_POST['secteur']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $file_name = mysqli_real_escape_string($conn, $_FILES['logo']['name']);

    if ($file_name) {
        $errors = array();
        $file_name = $_FILES['logo']['name'];
        $file_size = $_FILES['logo']['size'];
        $file_tmp = $_FILES['logo']['tmp_name'];
        $file_type = $_FILES['logo']['type'];
        $exp = explode('.', $_FILES['logo']['name']);
        $end_expl = end($exp);
        $file_ext = strtolower($end_expl);

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        $logo = getName($n) . '_' . $file_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../uploads/" . $logo);
            //echo "Success";
        } else {
            print_r($errors);
        }
        //3- Préparation de la requete
        $req = "INSERT INTO `entreprises`(`rsociale`, `adresse`, `ville`, `tel`, `email`, `secteur`, `description`, `logo`) VALUES ('" . $rsociale . "','" . $adresse . "','" . $ville . "','" . $tel . "','" . $email . "'," . $secteur . ",'" . $description . "','" . $logo . "')";
    } else {
        //3- Préparation de la requete
        $req = "INSERT INTO `entreprises`(`rsociale`, `adresse`, `ville`, `tel`, `email`, `secteur`, `description`) VALUES ('" . $rsociale . "','" . $adresse . "','" . $ville . "','" . $tel . "','" . $email . "'," . $secteur . ",'" . $description . "')";
    }


    //echo $req;

    //4- Execution de la requete
    $exec = mysqli_query($conn, $req);
    if ($exec) {
        $msg = "<div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    <strong>Well done!</strong> Votre entreprise a été ajouté.
</div>";
    } else {
        $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    <strong>Oh snap!</strong> Entreprise non ajouté!!!
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
                        <h4 class="box-title">Ajout Entreprise</h4>
                        <!-- /.box-title -->
                        <p><?php echo $msg; ?></p>
                        <div class="card-content">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom d'Entreprise</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" name="rsociale">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile" name="logo">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adresse</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" name="adresse">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ville</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" name="ville">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tel</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" name="tel">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" name="email">
                                </div>
                                <div class="m-t-20">
                                    <label for="exampleInputEmail1">Description</label>

                                    <textarea name="description" id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
                                </div>
                                </br>
                                <div class="form-group margin-bottom-20">
                                    <label for="exampleInputEmail1">Secteur d'Activité</label>
                                    <select class="form-control" name="secteur">
                                        <?php
                                        $query = "SELECT * FROM `secteur`";

                                        $exec = mysqli_query($conn, $query);

                                        while ($array = mysqli_fetch_array($exec)) {

                                        ?>
                                            <option value="0">Secteur</option>
                                            <option value="<?php echo $array['id_secteur']; ?>"><?php echo $array['lib_secteur']; ?></option>
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

        </div>
        <!-- /.main-content -->
    </div>
    <!--
	================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include "footer.php"; ?>