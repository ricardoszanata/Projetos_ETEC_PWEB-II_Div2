<?php
require '../controle/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "select catid, catnome, catativo from categorias";
$prp = $pdo->prepare($sql);
$prp->execute();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Consulta de Categorias</title>
</head>

<body>
    <div class="container">
        <div class="text-end">
            <a class="btn btn-success mt-3" href="inserir.php">📄 Novo</a>
        </div>
        <div class="input-group mt-3">
            <input type="text" name="edtfiltro" id="edtfiltro" class="form-control" placeholder="DIGITE A CATEGORIA PARA FILTRAR">
            <button type="button" onclick="" name="btnfiltrar" id="btnfiltrar" class="btn btn-info">🔎 Filtrar</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ds = $prp->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td>
                            <?php echo $ds['catnome']; ?>
                        </td>
                        <td>
                            <?php echo $ds['catativo'] ? '<span class="text-success">ATIVO</span>' : '<span class="text-danger"><b>INATIVO</b></span>'; ?>
                        </td>
                        <th scope="row">
                            <a class="btn btn-warning" href="alterar.php">✏ Editar</a>
                            <a class="btn btn-danger" href="excluir.php">🗑 Excluir</a>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>