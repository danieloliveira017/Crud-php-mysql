<?php
include_once "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    $query_del = "DELETE FROM usuarios WHERE id=:id";
    $result_del = $conn->prepare($query_del);
    $result_del->bindParam('id', $id);

    if($result_del->execute()){
        $retorna= ['erro'=> true, 'msg'=>  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Usuário apagado!!!
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>"]; 
    }else{
        $retorna= ['erro'=> true, 'msg'=>  "<div class='alert alert-danger' role='alert'>Usuário não apagado!!! </div>"];
    }

}else{
    $retorna= ['erro'=> true, 'msg'=>  "<div class='alert alert-danger' role='alert'>Usuário não apagado!!! </div>"];
}

echo json_encode($retorna);

?>
