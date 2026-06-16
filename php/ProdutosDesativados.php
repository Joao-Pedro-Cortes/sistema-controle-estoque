<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");
if($_SESSION['level'] != 0){
    $_SESSION['msg'] = "<p>Você não tem permissão para acessar essa página.</p>";
    header("Location: Entrada.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/desativados.css">
    <meta charset="UTF-8">
    <title>Produtos Desativados</title>
</head>
<body>
<div class="desativados-container">
<h1>Produtos Desativados</h1>

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    $_SESSION['msg'] = "";
}
?>

<table border="1">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Data de Entrada</th>
        <th>Ações</th>
    </tr>

<?php
$sql = "SELECT id_produto, codigo_produto, nome_produto, descricao, preco, quantidade, data_entrada FROM produtos WHERE ativo = 0";
$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id_produto, $codigo, $nome, $descricao, $preco, $quantidade, $data_entrada);
while(mysqli_stmt_fetch($stmt)){
    $data_br = date("d/m/Y H:i:s", strtotime($data_entrada));
    $preco_br = number_format($preco, 2, ',', '.');
    echo "
        <tr>
            <td>$codigo</td>
            <td>$nome</td>
            <td>$descricao</td>
            <td class='preco'>R$ $preco_br</td>
            <td>$quantidade</td>
            <td>$data_br</td>
            <td class='acoes'>
                <a class='acao-estoque' href='EntradaEstoque.php?id=$id_produto'>Adicionar Estoque</a>
                <a class='acao-reativar' href='ReativarProduto.php?id=$id_produto'>Reativar</a>
            </td>
        </tr>
    ";
}
?>

</table>
<hr>
<div class="botoes-final">
    <a class="botao-link" href="ConsultarProdutos.php">Voltar para Produtos Ativos</a>
    <a class="botao-link" href="Entrada.php">Voltar para Entrada</a>
</div>
</div>
</body>
</html>