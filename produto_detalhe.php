<?php
$sql_produto = 'SELECT * from produtos where id = :id';
$produto = $conn->prepare($sql_produto);
$produto->execute(['id' => $_GET['id']]);
$produto_detalhes = $produto->fetch();
?>
<h1 style = " font-family: Arial, Helvetica, sans-serif; font-size: 20px; text-align: center; 
color:black; font-weight: bold"><?php echo $produto_detalhes['descricao']; ?></h1>


<div class="card mb-4"  style="width: auto; margin-left: 25%; margin-top: 50px; text-align:" >
<img src="https://i.zst.com.br/thumbs/12/3b/b/-709050601.jpg" class="card-img-top" style=" width: 18rem;" <?php echo $produto_detalhes['imagem']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $produto_detalhes['descricao']; ?></h5>
        <p class="card-text"><?php echo $produto_detalhes['resumo']; ?></p>
        <p class="card-text">
        <h3>R$ <?php echo $produto_detalhes['valor']; ?></h3>
        </p>
        <p class="card-text">
        <form method="post">
            <input class="btn btn-outline-success" type="submit" name="adicionar_sacola" value="Adicionar ao Carrinho">
        </form>
        </p>
        <p class="card-text" style="margin-button: 50px;"><small class="text-muted"><?php echo $produto_detalhes['caracteristicas']; ?></small></p>

    </div>
</div>