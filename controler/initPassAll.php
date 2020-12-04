<?php
    // better to make a function of this code

    //get json data
    $data = file_get_contents('../db.json');
    $data_array = json_decode($data, true);
    $updated_array = $data_array;
    $count = count($data_array);
    for ($i=0; $i < $count; $i++) {

        $row = $data_array[$i]; 
    // foreach ($data_array as $val => $row) {
        $id = $row['id'];
        $prenom = $row['prenom'];
        $nom = $row['nom'];
        $email = $row['email'];
        $genre = $row['genre'];
        echo $row;
        $pre = substr($prenom, 0, 3);
        $no = substr($nom, 0, 6);

        $newPass = $pre . $no;

        $update_row = array(
            'id' => $id,
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'genre' => $genre,
            'password' => $newPass
        );

        $data_array[$i] = $update_row;
    }


    $data_array = json_encode($data_array, JSON_PRETTY_PRINT);

    file_put_contents('../db.json', $data_array);

    header('location: ../index.php');
?>