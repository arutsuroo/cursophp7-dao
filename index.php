<?php
require_once("config.php");

//Carrega um usuário
// $root = new Usuario();
// $root->loadById(1);
// echo $root;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("smith");
//echo json_encode($search);

//Carrega um usuário usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("John Smith","54321");
//echo $usuario;

//Criando novo usuário
//$aluno = new Usuario("Liz Shaw", "b3ss13");
////
////$aluno->insert();
////
////echo $aluno;
///
$usuario = new Usuario();

$usuario->loadById(1);
$usuario->update("root", "root");

echo $usuario;



