<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($password != "" && $email != ""){
        $conn = new mysqli("localhost", "root", "", "dynamic_forms_generator");
        if($conn -> connect_error){
            exit("Eroare la conectare". $conn -> connect_error);
        }
        $stmt = $conn -> prepare("SELECT * FROM utilizatori WHERE email = ?;");
        $stmt -> bind_param('s',$email);
        $stmt -> execute();
        $result = $stmt -> get_result();
        if(mysqli_num_rows($result) == 0){
            echo "!exists";
        }else{
            $row = $result -> fetch_array();
            if(password_verify($password,$row['parola'])){
                echo $email;
            }else{
                echo "!exists";
            }
        }
    };
}

?>