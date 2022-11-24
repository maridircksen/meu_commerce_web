<?php
$sql_categoria = 'SELECT * from categorias where id = :id';
$categoria = $conn->prepare($sql_categoria);
$categoria->execute(['id' => $_GET['categoria']]);
$linha_categoria = $categoria->fetch();

if (empty($linha_categoria['categoria_pai'])) {
    include 'produtos_destaque.php';
} else {
     ?>
<h3 style =' font-family: Arial, Helvetica, sans-serif; font-size: 20px; text-align: center; color:#106184; 
font-weight: bold'>Produtos da Categoria: <?php echo $linha_categoria['descricao']; ?> </h3>

<div class="row">
    <?php
    $sql_produtos = 'SELECT * from produtos where categoria_id = :id';
    $consulta_produtos = $conn->prepare($sql_produtos);
    $consulta_produtos->execute(['id' => $_GET['categoria']]);

    while ($produto = $consulta_produtos->fetch()) { ?>
    <div class="card" style="width: 18rem; margin-left: 25%; margin-top: 50px;">
    <img src="https://i.zst.com.br/thumbs/12/3b/b/-709050601.jpg" class="card-img-top" style="margin-top:20px; width: 18rem;"<?php echo $produto[
    'descricao'
]; ?>>
        <div class="card-body" style ="text-align: center;">
            <h5 class="card-title" style="text-align: justify";><?php echo $produto['descricao']; ?></h5>
            <p class="card-text" style="text-align: justify;"><?php echo $produto['resumo']; ?></p>
            <a href="?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-outline-dark">Saber Mais Detalhes</a>
        </div>
    </div>
    <?php }
    ?>
</div>

<?php
} ?>