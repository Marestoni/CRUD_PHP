<?php

require_once 'php_action/init.php';
 
// resgata os valores do formulário
$nome_produto = isset($_POST['name']) ? $_POST['name'] : null;
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;

$id = isset($_POST['id']) ? $_POST['id'] : null;
 
// validação
if (empty($nome_produto) || empty($valor))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE produtos SET nome_produto = :nome_produto, valor = :valor  WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome_produto', $nome_produto);
$stmt->bindParam(':valor', $valor);

$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: index.php?');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}