<?php
include_once './core/ConexaoBD.class.php';

$nome = $_POST['NomeCompleto'];
$email = $_POST['Email'];
$senha = $_POST['Senha'];


$Conexao = new ConexaoBD();

$stmt = $Conexao->ObterConexao()->prepare("INSERT INTO cadastro VALUES(?,?,?);");;

$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $senha);

$stmt->execute();

echo '<script>window.location.href = "./indexview.class.php"</script>';
