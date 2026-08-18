<?php
require '../controle/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cnome = strtoupper(filter_input(INPUT_POST, 'edtnome'));
    $sql = "insert into categorias (catnome) values (?);";
    $prp = $pdo->prepare($sql);
    if ($prp->execute([$cnome])) {
        $msg = '<span class="alert alert-success">Dados gravados com Sucesso!!!</span>';
        header("refresh: 5; url=consultar.php");
    } else {
        $msg = '<span class="alert alert-danger">Não foi possível gravar os Dados!!!</span>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Cadastrar Categorias</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center text-primary mt-3">Cadastro de Categorias</h3>
        <form action="" method="post">
            <div class="input-group mt-3">
                <span class="input-group-text">Categoria</span>
                <input type="text" name="edtnome" id="edtnome" class="form-control" required>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3">💾 Gravar</button>
            </div>
        </form>
        <div class="mt-5 text-center">
            <?php echo $msg; ?>
        </div>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>