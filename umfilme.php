<?php
include "cabecalho.php";
// 1 = Recuperar informação do id
$id = $_GET['id'];
// 2 = Conexão com bd
include "conexao.php";
// 3 = Montagem do sql
$sql = "select * from filmes where id = $id ";
// 4 = Execução do sql
$resultado = mysqli_query($conexao, $sql);
// 5 = Definição das variáveis do filme
$titulo = "";
$historia = "";
$categoria = "";
$avaliacao = "";
$foto = "";
// 6 = Laço com as informações do filme
while ($linha = mysqli_fetch_assoc($resultado)) {
    $titulo = $linha["titulo"];
    $historia = $linha["historia"];
    $categoria = $linha["categoria"];
    $avaliacao = $linha["avaliacao"];
    $foto = $linha["foto"];
}
// 8 = Fechar a conexão com o bd
mysqli_close($conexao);
// 7 = Mostrar as informações na tela
?>
<div class="container">
    <div class="row mx-5 mt-5">
        <div class="col">
            <img src="<?= $foto ?>" class="img-fluid">
        </div>
        <div class="col">
            <h2 class="text-start"><?= $titulo ?></h2>
            <p>⭐ <?= $avaliacao ?>/10</p>
            <p><strong>Categoria:</strong> <?= $categoria ?></p>
            <p><strong>História:</strong> <?= $historia ?></p>
        </div>
    </div>
</div>
<?php include "rodape.php"; ?>