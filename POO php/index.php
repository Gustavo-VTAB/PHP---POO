<?php

include("./Classe/Db.class.php");
include("./Classe/Usuario.php");

function consultarDados($usuario, $db, $campos, $where){

    $dados = $usuario->consultar($db, $campos, $where);

    if(!empty($dados)){
        foreach($dados as $umUsuario){
            echo"<br>cpf: " . $umUsuario['cpf'];
            echo "<br>nome: " . $umUsuario['nome'];
            echo "<br>email: " . $umUsuario['email'];

        }
    }else{
        echo"Registro inexistente";   
    }
}

$db = new Db();
$db -> conectar();

$db->setTabela(tabela: "usuarios");





$usuario = new Usuario( cpf: "11112223330", 
    nome:"MANUEL",
    celular:"(18)996434609", 
    email:"Manu@gmail.com",
    login: "Manuel", 
    senha:"1234567");

$usuario->gravar(db: $db);

echo"<h1>Cadastrou um usuario</h1>";


$campos = "cpf, nome, email";
$where = "cpf = 11112223330";

consultarDados($usuario, $db, $campos, $where);

$dadosAlterar = [];
$dadosAlterar['nome'] = "Clebin chuchucão";
$dadosAlterar['email'] = "Clebin@gmail.com";
$usuario->alterar($db, $dadosAlterar, $where);

// echo"<pre>";
// print_r($dados)

?>