<?php
require '../conexao.php';
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
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Cadastro de Produtos</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="edtnome">NOME</label>
                <input type="text" name="edtnome" id="edtnome" class="form-control">
            </div>
        </form>
    </div>
</body>

</html>