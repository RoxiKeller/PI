<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $parola_criptata = password_hash($password,PASSWORD_DEFAULT);
    if($password != "" && $email != ""){
        $conn = new mysqli("localhost", "root", "", "dynamic_forms_generator");
        if($conn -> connect_error){
            exit("Eroare la conectare". $conn -> connect_error);   
        }
        $stmt = $conn -> prepare("INSERT INTO utilizatori (email, parola) VALUES (?, ?);");
        $stmt -> bind_param('ss',$email,$parola_criptata);
        $stmt -> execute();

        echo "ok";
    }
}



?>