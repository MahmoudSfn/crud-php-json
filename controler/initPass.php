<?php
    // better to make a function of this code
    $user_id = $_GET['user_id']-1;
    
    //get json data
    $data = file_get_contents('../db.json');
    $data_array = json_decode($data, true);
    $row = $data_array[$user_id]; 

    $prenom = $row['prenom'];
    $nom = $row['nom'];
    $email = $row['email'];
    $genre = $row['genre'];

    $pre = substr($prenom, 0, 3);
    $no = substr($nom, 0, 3);

    $newPass = $pre . $no;

    $update_arr = array(
        'id' => $user_id + 1,
        'prenom' => $prenom,
        'nom' => $nom,
        'email' => $email,
        'genre' => $genre,
        'password' => $newPass
    );
    
    $data_array[$user_id] = $update_arr;

    $data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents('../db.json', $data);
    header('location: ../index.php');
?>