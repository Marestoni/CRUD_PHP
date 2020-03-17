<?php
 
require_once 'php_action/init.php';
 
// pega os dados do formuário
if(isset($_POST['btn-cadastrar'])):
$nome_produto = isset($_POST['name']) ? $_POST['name'] : null;
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;

 
// validação
if (empty($nome_produto) || empty($valor))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 


 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO produtos(nome_produto, valor) VALUES(:nome_produto, :valor)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome_produto', $nome_produto);
$stmt->bindParam(':valor', $valor);

 
 
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
endif;