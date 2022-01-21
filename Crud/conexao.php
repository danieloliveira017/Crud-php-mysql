<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName= "celke";
$port = 3306;

try{
$conn= new PDO("mysql:host=$host; port=$port; dbname=". $dbName, $user, $pass);
//echo "conexão feita com sucesso";
}catch(PDOException $err){
    //echo "erro com a conexão!!!". $err->getMessage();
}

?>