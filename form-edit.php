<?php
include_once 'php_action/init.php';
include_once 'includes/header.php';
 
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados do produto a ser editado
$PDO = db_connect();
$sql = "SELECT nome_produto, valor FROM produtos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$prod = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não é de um produto valido
if (!is_array($prod))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<div class="container">

        <form action="edit.php" method="post">
            <div class="row">
                <h2 class="ligth">Edite seu produto</h2>
            </div> 

        <div class= "row">
            <div class="col-sm-6 col-12">
                <input class="form-control"type="text" name="name" id="name" value="<?php echo $prod['nome_produto'] ?>"> 
            </div>
            <div class="col-sm-6 col-12">
                <input class="form-control" type="text" name="valor" id="valor" value="<?php echo $prod['valor'] ?>">
            </div>
 
            <input type="hidden" name="id" value="<?php echo $id ?>">
 
            <button type="submit" name="btn-editar" class="btn btn-outline-success my-2" role="button">Editar</button>
        </div>
        </form>


</div>
<?php
include_once 'includes/footer.php';

?>