<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $nota = $_POST['nota'];
    $comentariu = $_POST['comentariu'];
    
        $conn = new mysqli("localhost", "root", "", "dynamic_forms_generator");
        
        
            $stmt = $conn -> prepare("INSERT INTO recenzii (email, nota, comentariu) VALUES (?, ?, ?);");
            $stmt -> bind_param('sds',$email,$nota,$comentariu);
            $stmt -> execute();
            echo "ok";
       
    
}
?>