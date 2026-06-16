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
            <label for="edtsubcategoria" class="mt-2">Subcategoria</label>
            <div class="input-group">
                <input type="text" class="input-group-text" name="edtsubid" id="edtsubid" readonly>
                <input type="text" name="edtsubcategoria" id="edtsubcategoria" class="form-control" readonly>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#frmsubcategoria">Buscar</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="frmsubcategoria" tabindex="-1" aria-labelledby="frmsubcategoriaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="frmsubcategoriaLabel">Lista Subcategorias</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            $sqlsub = "select * from subcategorias;";
                            $prpsub = $pdo->prepare($sqlsub);
                            $prpsub->execute();
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            Subcategorias
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($dssubcategoria = $prpsub->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $dssubcategoria['subnome']; ?>
                                            </td>
                                            <td>
                                                <button onclick="pegaSubcategoria()" class="btn btn-outline-info">Selecionar</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Selecionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>