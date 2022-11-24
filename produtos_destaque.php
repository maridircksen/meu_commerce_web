<h3 style =" font-family: Arial, Helvetica, sans-serif; font-size: 20px; text-align: center; color:#106184; 
font-weight: bold">Produtos em Destaque</h3>

<?php if (isset($_GET['categoria'])) {
    $sql_produtos_destaque = '
       SELECT p.id, p.descricao, p.valor, p.resumo, p.imagem
        FROM produtos p
        WHERE p.categoria_id in (select id from categorias where categoria_pai = :categoria_id or id = :categoria_id)
        ORDER BY RAND()
        LIMIT 4
    ';
    $sql_produtos_destaque = $conn->prepare($sql_produtos_destaque);
    $sql_produtos_destaque->execute(['categoria_id' => $_GET['categoria']]);
} else {
    $sql_produtos_destaque = '
        SELECT id, descricao, valor, resumo, imagem
        FROM produtos
        ORDER BY RAND()
        LIMIT 4;
    ';
    $sql_produtos_destaque = $conn->prepare($sql_produtos_destaque);
    $sql_produtos_destaque->execute();
} ?>
<div class="row">
    <?php while ($produto = $sql_produtos_destaque->fetch()) { ?>
    <div class="card" style="width: auto; margin-left: 25%; margin-top: 50px">
    <img src="https://i.zst.com.br/thumbs/12/3b/b/-709050601.jpg" class="card-img-top" style="margin-top:20px; width: 18rem;"><?php echo $produto[
    'descricao'
    ]; ?>
        <div class="card-body" style="text-align: center;">
            <h5 class="card-title" style="text-align: justify;"><?php echo $produto['descricao']; ?></h5>
            <p class="card-text" style="text-align: justify;"><?php echo $produto['resumo']; ?></p>
            <a href="?pagina=produto&id=<?php echo $produto['id']; ?>" class="btn btn-outline-dark" >Saber Mais Detalhes</a>
        </div>
    </div>
    <?php } ?>
</div>