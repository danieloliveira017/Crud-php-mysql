<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){

    //calcular quantidade da paginação!!!

    $qnt_Pag = 7;
    $inicio= ($pagina * $qnt_Pag) - $qnt_Pag;

 $query_users = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT $inicio , $qnt_Pag";
 $result = $conn->prepare($query_users);
 $result->execute();

$dados="<div class='able-responsive'>
<table class=' table table-hover table-bordered table-light'>
    <thead>
        <h4>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
</h4>
    </thead>";

 while($row_result = $result->fetch(PDO::FETCH_ASSOC)){
     //var_dump($row_result);
     extract($row_result);
     $dados.="<tr>
     <td>".$id."</td><td>".$nome."</td><td>".$email."</td>
     <td>
     <button id='$id' type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick='visualizar($id)'>Visualizar</button>
     <button id='$id' type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editarModal' onclick='editar($id)'>Editar</button>
     <button id='$id' type='button' class='btn btn-danger btn-sm' onclick='apagar($id)'>Excluir</button>
     </td>
     </tr>";
     
 }
 $dados.="<tbody>

 </tbody>
</table>
</div>";

//paginação
//quantidade de usuarios na tabela

$query_paginacao= "SELECT COUNT(id) AS num_paginas FROM usuarios";
$result_pg = $conn->prepare($query_paginacao);
$result_pg->execute();
$row_pg= $result_pg->fetch(PDO::FETCH_ASSOC);

//QUANTIDADE DE PAGINAS

$quantida_paginas= ceil( $row_pg['num_paginas']/$qnt_Pag);
$max_link= 2;

$dados .= '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
  $dados .= "<li class='page-item '><a class='page-link' href='#' onClick='listUser(1)'>Primeira pag...</a></li>";
  for($pag_ant = $pagina - $max_link; $pag_ant <= $pagina -1; $pag_ant++){
      if($pag_ant >=1){
  $dados.= "<li class='page-item'><a class='page-link' href='#' onClick='listUser($pag_ant)'>$pag_ant</a></li>";
      }
  }
  $dados.="<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

  for($pag_dep = $pagina +1; $pag_dep <= $pagina + $max_link; $pag_dep++){
      if($pag_dep <= $quantida_paginas){
  $dados.="<li class='page-item'><a class='page-link' href='#' onClick='listUser($pag_dep)'>$pag_dep</a></li>";
      }
  }
  $dados.="<li class='page-item'><a class='page-link' href='#' onClick='listUser($quantida_paginas)'>Última</a></li>";
  $dados.='</ul></nav>';

echo $dados;


}else{
    echo "<div class='alert alert-danger' role='alert'>
   ERRO: Nem um usuario encontrado!
  </div>";
}
?>