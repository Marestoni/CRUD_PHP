<?php
include_once 'includes/header.php';
include_once 'php_action/init.php';
?>
<div class="container">
    <form action="add.php" method="POST" >
        <div class="row">
            <h2>Cadastro de Produtos</h2>
        </div>
        <div class="row">
            
                
                    <div class="col-sm-6 col-12">
                        <input class="form-control" type="text" name="name" id="name" placeholder="Nome Produto">
                    </div>
                    <br>
                    <div class="col-sm-6 col-12">
                        <input class="form-control" type="text" name="valor" id="valor" placeholder="Valor">
                    </div>
                    <div class="col-sm-6 col-12">                    
                        <button type="submit" name="btn-cadastrar" class="btn btn-outline-primary my-2" role="button">Cadastrar</button>
                    </div>           
                </form>
         </div>
    </form>
</div>
<?php
include_once 'includes/footer.php';
?>