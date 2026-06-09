<?php
require '../controle/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = strtoupper(filter_input(INPUT_POST, 'edtnome'));
    $descricao = strtoupper(filter_input(INPUT_POST, 'edtdescricao'));
    $valorcusto = filter_input(INPUT_POST, 'edtvlcusto');
    $valorvenda = filter_input(INPUT_POST, 'edtvlvenda');
    $quantidade = filter_input(INPUT_POST, 'edtquantidade');
    $subid = filter_input(INPUT_POST, 'edtsubid');
    $sqlpro = "";
    $prppro = $pdo->prepare($sqlpro);
    $prppro->execute();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Cadastro de Produtos</title>
</head>

<body>
    <div class="container mt-3">
        <form action="" method="post">
            <div class="form-group mt-2">
                <label for="edtnome">Nome</label>
                <input type="text" name="edtnome" id="edtnome" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="edtdescricao">Descrição</label>
                <input type="text" name="edtdescricao" id="edtdescricao" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="edtvlcusto">Valor de Custo</label>
                <input type="text" name="edtvlcusto" id="edtvlcusto" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="edtvlvenda">Valor de Venda</label>
                <input type="text" name="edtvlvenda" id="edtvlvenda" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="edtquantidade">Quantidade</label>
                <input type="number" name="edtquantidade" id="edtquantidade" class="form-control">
            </div>
              <div class="form-group mt-2">
                <label for="edtsubcategoria">Subcategoria</label>
                <input type="text" name="edtsubid" id="edtsubid" class="form-control mb-1" readonly>
                <input type="text" name="edtsubcategoria" id="edtsubcategoria" class="form-control">
            </div>
        </form>
    </div>
</body>

</html>