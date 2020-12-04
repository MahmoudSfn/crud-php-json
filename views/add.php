<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test Technique Hospitalidee</title>
        <?php include("../includes/head.php"); ?>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout ">
			<header class="mdl-layout__header mdl-layout__header--waterfall">
				<div class="mdl-layout__header-row">
					<h1 class="mdl-layout-title">Freshcore</h1>
				</div>
			</header>
			<main class="mdl-layout__content">
				<div class="page-content">
					<div class="centeritems mdl-grid">
						<div class="mdl-layout-spacer"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            $mailFormat = false;
                                            $mailValidity = false;
                                            if(isset($_POST['btnadd'])) {
                                                if ((boolean)filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) {
                                                    $data = file_get_contents('../db.json');
                                                    $data = json_decode($data);
                                                    
                                                    $newmail = $_POST['txtEmail'];
                                                    if(!empty($data)){
                                                        foreach($data as $row){
                                                            $rega = $row->email;
                                                            if ($rega == $newmail) {
                                                                $mailValidity = true;
                                                            }
                                                        }
                                                    }
                                                    if (!$mailValidity) {
                                                        $data = file_get_contents('../db.json');
                                                        $data = json_decode($data, true);

                                                        $max_id = max($data);
                                                        $max_id = $max_id["id"] + 1;
                                                        $add_arr = array(
                                                            'id' => $max_id,
                                                            'prenom' => $_POST['txtFname'],
                                                            'nom' => $_POST['txtLname'],
                                                            'email' => $_POST['txtEmail'],
                                                            'genre' => $_POST['radioGenre'],
                                                            'password' => $_POST['txtMdp']
                                                        );
                                                        $data[] = $add_arr;

                                                        $data = json_encode($data, JSON_PRETTY_PRINT);
                                                        file_put_contents('../db.json', $data);

                                                        header('location: ../index.php');
                                                    }
                                                } else {
                                                    $mailFormat = true;
                                                }
                                            }
                                            // }
                                        ?>
                                        <div class="card">
                                            <div class="card-body card-body_add">
                                                <form method="post" name="frmAdd">
                                                <center>
                                                    <h3 class="h3">Add User</h3>
                                                    <hr />
                                                </center>
                                                <div class="form-group">
                                                    <label for="inputPrenom">Prenom</label>
                                                    <input id="inputPrenom" type="text" name="txtFname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNom">Nom</label>
                                                    <input id="inputNom" type="text" name="txtLname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="txtEmail" placeholder="Enter email *" required="required" data-error="Email is required.">
                                                    <?php if ($mailFormat)  echo "<div style='color: red;'>* Check your mail format again</div>"  ?>
                                                    <?php if ($mailValidity)  echo "<div style='color: red;'>* Your mail already exist</div>"  ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Genre</label>
                                                    <br />
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="madame" name="radioGenre" class="custom-control-input" value="Madame">
                                                        <label class="custom-control-label" for="madame">Madame</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="monsieur" name="radioGenre" class="custom-control-input" value="Monsieur">
                                                        <label class="custom-control-label" for="monsieur">Monsieur</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="motdepass">Password</label>
                                                    <input type="password" name="txtMdp" class="form-control" id="motdepass" placeholder="Password *">
                                                </div>
                                                <center>
                                                    <hr />
                                                    <input type="submit" class="btn btn-info" value="Add" name="btnadd">
                                                </center>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-layout-spacer"></div>
					</div>
				</div>
            </main>
        </div>

    <?php include("../includes/footer.php"); ?>
    </body>
</html>