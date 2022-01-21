<?php

include_once "conexao.php";

$resultDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($resultDados['nome'])){
    $retorna= ['erro'=> true, 'msg'=>  "<div class='alert alert-danger' role='alert'>Favor! Preencha o nome </div>"];
}elseif(empty($resultDados['email'])){
    $retorna= ['erro'=> true, 'msg'=>  "<div class='alert alert-danger' role='alert'>Favor! Preencha o email </div>"];
}else{

$query_user = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
$cad_user = $conn->prepare($query_user);
$cad_user->bindParam(':nome', $resultDados['nome']);
$cad_user->bindParam(':email', $resultDados['email']);
$cad_user->execute();

if($cad_user->rowCount()){
    $retorna = ['erro'=> false, 'msg'=> "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!!!</div>"];
}else{
    $retorna= ['erro'=> true, 'msg'=>  "<div class='alert alert-danger' role='alert'>Usuário não cadastrado!!! </div>"];
}
}
echo json_encode($retorna);

?>