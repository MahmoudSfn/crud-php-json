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
            <div class="col-md-12">
            
                    <?php
                        $edit_id = $_GET['edit_id']-1;

                        //get json data
                        $data = file_get_contents('../db.json');
                        $data_array = json_decode($data, true);
                        $row = $data_array[$edit_id]; 
                    ?>
                    <?php
                    if( isset($_POST['btnUpdate']) )
                    { 

                        $update_arr = array(
                            'id' => $edit_id + 1,
                            'prenom' => $_POST['txtFname'],
                            'nom' => $_POST['txtLname'],
                            'email' => $_POST['txtEmail'],
                            'genre' => $_POST['radioGenre'],
                            'password' => $_POST['txtMdp']
                        );

                        $data_array[$edit_id] = $update_arr;

                        $data = json_encode($data_array, JSON_PRETTY_PRINT);
                        file_put_contents('../db.json', $data);

                        header('location: ../index.php');
                    }
                    ?>
                    <!-- START -->
                    <div class="card">
                    <div class="card-body card-body_update">
                        <form method="post" name="frmUpdate">
                        <center>
                            <h3 class="h3">Update User</h3>
                            <hr />
                        </center>
                        <div class="form-group">
                            <label for="inputPrenom">Prenom</label>
                            <input id="inputPrenom" type="text" name="txtFname" class="form-control" placeholder="Please enter your firstname *" value="<?php echo $row['prenom'];?>" required="required" data-error="Firstname is required.">
                        </div>
                        <div class="form-group">
                            <label for="inputNom">Nom</label>
                            <input id="inputNom" type="text" name="txtLname" class="form-control" placeholder="Please enter your lastname *" value="<?php echo $row['nom'];?>" required="required" data-error="Lastname is required.">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="txtEmail" placeholder="Enter email *" value="<?php echo $row['email'];?>"> required="required" data-error="Email is required.">
                        </div>
                        <div class="form-group">
                            <label for="">Genre</label>
                            <br />
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="madame" name="radioGenre" class="custom-control-input" <?php if ($row['genre'] === "Madame") echo "checked"; ?>  value="Madame">
                                <label class="custom-control-label" for="madame">Madame</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="monsieur" name="radioGenre" class="custom-control-input" <?php if ($row['genre'] === "Monsieur") echo "checked"; ?> value="Monsieur">
                                <label class="custom-control-label" for="monsieur">Monsieur</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="motdepass">Password</label>
                            <input type="password" name="txtMdp" class="form-control" id="motdepass" placeholder="Password *" value="<?php echo $row['password'];?>">
                        </div>
                        <center>
                            <hr />
                            <input type="submit" class="btn btn-warning" value="Update" name="btnUpdate">
                        </center>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <?php include("../includes/footer.php"); ?>
    </body>
</html>