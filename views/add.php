<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test Technique Hospitalidee</title>
        <?php include("../includes/header.php"); ?>
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <?php

                if(isset($_POST['btnadd'])) {
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

            <div class="col-md-2"></div>
        </div>
    </div>

    <?php include("../includes/footer.php"); ?>
    </body>
</html>