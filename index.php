<?php
include_once 'php_action/init.php';
include_once 'includes/header.php';
 
// abre a conexão
$PDO = db_connect();
 
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount()
$sql_count = "SELECT COUNT(*) AS total FROM produtos ORDER BY nome_produto ASC";
 
// SQL para selecionar os registros
$sql = "SELECT id, nome_produto, valor FROM produtos ORDER BY nome_produto ASC";
 
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
 
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>

<div class="container">
    
    <div class="row">                  
        
        <div class="span12" style="text-align:center; margin: 0 auto;">
            <h2>Lista de Produtos</h2> 
              
            <td><a href="form-add.php" class="btn btn-outline-success mb-2" role="button">Adicionar</a></td>

            <?php if ($total > 0): ?>
        </div>

        <table id="tabela" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nome Produto</th>
                    <th scope="col">Valor</th>
                    <th width="20%" ></th>                
                </tr>
            </thead>
            <tbody>
                <?php while ($prod = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $prod['nome_produto'] ?></td>
                    <td><?php echo $prod['valor'] ?></td>
                    <td>
                        <a href="form-edit.php?id=<?php echo $prod['id'] ?>"
                        class="btn btn-outline-info" role="button"><i class="material-icons">edit</i></a>
                        <a href="delete.php?id=<?php echo $prod['id'] ?>" 
                        onclick="return confirm('Tem certeza de que deseja remover?');"
                        class="btn btn-outline-danger">Deletar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
 
        <?php else: ?>
 
        <p>Nenhum produto registrado</p>       
 
        <?php endif; ?>
        <p>Total produtos: <?php echo $total ?></p>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>