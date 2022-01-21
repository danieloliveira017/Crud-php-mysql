const tbody = document.querySelector('.listar-usuarios');
const cadUsuario = document.getElementById('cadastroUsuario');
const buscaUsuario = document.getElementById('buscarUsuario');
const editUsuario = document.getElementById('editarUsuario');
const msgAlert = document.getElementById('msg');
const msgDell = document.getElementById('dell');
const msgEdit = document.getElementById('msgEdit');

//coverter
const listUser = async(pagina)=>{
  const dados=  await fetch("./list.php?pagina="+pagina); //listar a pagina
  const result = await dados.text();
  tbody.innerHTML = result;
}

listUser(1); // numero de pagina

cadUsuario.addEventListener("submit", async(event)=>{
    event.preventDefault();
    //console.log("cadastrar");
    const dadosForm = new FormData(cadUsuario);
    dadosForm.append("add", 1);
    //console.log(dadosForm);
    const resultForm = await fetch("cadastrar.php", {
        method: "POST",
        body: dadosForm,
    })

   const resposta = await resultForm.json();
   console.log(resposta);

   if(resposta['erro']){
       msgAlert.innerHTML = resposta['msg'];
   }else{
       msgAlert.innerHTML = resposta['msg'];
       cadUsuario.reset();
       //cadModal.hide();
       listUser(1); 
   }
});

//visualizar 

async function visualizar(id){
    const dados = await fetch('visualizar.php?id='+id);
    const result = await dados.json();
    console.log(result);

    if(result['erro']){
        msgAlert.innerHTML=result['msg'];
    }else{
        document.getElementById('id-visu').innerHTML=result['dados'].id;
        document.getElementById('nome-visu').innerHTML=result['dados'].nome;
        document.getElementById('email-visu').innerHTML=result['dados'].email;
    }

}
//--***editar***--\\

async function editar(id){
    msgEdit.innerHTML ="";
 // console.log("ola, bom dia " + id );
  const dados = await fetch('visualizar.php?id='+id);
  const result = await dados.json();
  //console.log(result);

    if(result['erro']){
        msgEdit.innerHTML = result['msg'];
    }else{
        console.log(result);
        document.getElementById('editid').value=result['dados'].id;
        document.getElementById('nomeEdit').value=result['dados'].nome;
        document.getElementById('emailEdit').value=result['dados'].email;

    }
}
    editUsuario.addEventListener("submit", async(e)=>{
        e.preventDefault();
         const editForm = new FormData(editUsuario);
       /* for(var dadoss of editForm.entries()){
            console.log(dadoss[0] + '-' + dadoss[1]);
        }*/
    
  const dadosEdit= await fetch("editar.php", {
        method: "POST",
        body: editForm
    })

    const editResposta = await dadosEdit.json();
    console.log(editResposta);

    if(editResposta['erro']){
        msgEdit.innerHTML = editResposta['msg']
    }else{
        msgEdit.innerHTML = editResposta['msg'];
        listUser(1);
    }
});

async function apagar(id){
    var confirmar = confirm("Tem certeza de apagar os Dados?");
    
    if(confirmar == true){
    const dados= await fetch('deletar.php?id=' + id);
    const repostaDados = await dados.json();
    listUser(1);
    if(repostaDados['erro']){
        msgDell.innerHTML= repostaDados['msg'];
    }else{
        
        msgDell.innerHTML= repostaDados['msg'];
        
    }
}
}


