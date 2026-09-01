<?php
/*
mesma coisa que o uses do Delphi ou Lazarus (ALT+F11)
*/
require './controle/conexao.php';
/*
FDQuery do Delphi ou ZQuery do Lazarus
Conectamos a Query
*/
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sqlpro =
  "
select 
    proid,
    pronome,
    prodescricao,
    provalorcusto,
    provalorvenda,
    proquantidade,
    prosubid,
    subnome,
    subcatid,
    catnome,
    fotcaminho,
    proativo
from
    produtos,
    subcategorias,
    categorias,
    fotosproduto
where
    prosubid = subid
and
    subcatid = catid
and 
    fotproid = proid
and
    fotprincipal = 1
";
$prppro = $pdo->prepare($sqlpro);
$prppro->execute();
/*while($dspro = $prppro->fetch(PDO::FETCH_ASSOC)){
  echo $dspro['pronome'].'<br>';
}*/
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>O Lojinha</title>
  <link
    rel="stylesheet"
    href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
</head>

<body>
  <header>
    <?php require('menu.php'); //unit uses unit
    ?>
  </header>
  <main class="container">
    <?php require('carousel.php'); //unit uses unit
    ?>
    <div class="row">
      <?php while ($dspro = $prppro->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col-sm-3 mt-2">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo $dspro['fotcaminho']; ?>" class="card-img-top" style="height: 16rem;" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo mb_strimwidth($dspro['pronome'], 0, 60, "..."); ?></h5>
              <p class="card-text"><?php echo mb_strimwidth($dspro['prodescricao'], 0, 130, "..."); ?></p>
              <p class="text-danger">Valor:<b>R$ <?php echo $dspro['provalorvenda']; ?></b></p>
              <p class="text-primary">Estoque: <?php echo $dspro['proquantidade']; ?></p>
              <a href="#" class="btn btn-primary">Ver Produto</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
