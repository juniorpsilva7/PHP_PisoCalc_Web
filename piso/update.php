<?php

require '../db/database.php';

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
     
if ( null==$id ) {
    header("Location: list.php");
}
     
if ( !empty($_POST)) {
         
    //$fornecedor = $_POST['fornecedor'];
    //$foto = $_POST['foto'];
    $base = $_POST['base'];
    $altura = $_POST['altura'];
    $cozinha = $_POST['cozinha'];
    $sala = $_POST['sala'];
    $banheiro = $_POST['banheiro'];
    $quarto = $_POST['quarto'];
    $areaext_cob = $_POST['areaext_cob'];
    $areaext_ncob = $_POST['areaext_ncob'];
//    //$tipo = $_POST['tipo'];
    $cor = $_POST['cor'];
    $qtdadexcaixa = $_POST['qtdadexcaixa'];
    $preco = $_POST['preco'];
        
         
    // validate input
    $valid = true;
         
        // update data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE piso set fornecedor_idFornecedor = ?, base = ?, altura = ?, cozinha = ?, sala = ?, banheiro = ?, quarto = ?, areaext_cob = ?, areaext_ncob = ?, cor = ?, qtdadexcaixa = ?, preco = ? WHERE idPiso = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array(1, $base, $altura, $cozinha, $sala, $banheiro, $quarto, $areaext_cob, $areaext_ncob, $cor, $qtdadexcaixa, $preco, $id));
        Database::disconnect();
        header("Location: index.php");
    }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM piso where idPiso = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        //$fornecedor = $data['fornecedor'];
        //$foto = $data'foto'];
        $base = $data['base'];
        $altura = $data['altura'];
        $cozinha = $data['cozinha'];
        $sala = $data['sala'];
        $banheiro = $data['banheiro'];
        $quarto = $data['quarto'];
        $areaext_cob = $data['areaext_cob'];
        $areaext_ncob = $data['areaext_ncob'];
        //    //$tipo = $data['tipo'];
        $cor = $data['cor'];
        $qtdadexcaixa = $data['qtdadexcaixa'];
        $preco = $data['preco'];
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<?php include ('../layout/headerlogado.php'); ?>
<br/>

<body>
    <div class="container">
        <a class="btn btn-default" href="index.php">Voltar ao painel</a><br/>
        
                <div class="col-xs-offset-1 col-md-6">
                    
                    <div class="bg-warning">
                        <h3>Editar</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      
                        <div>
                        <label>Base (use ponto ao invés de vírgula):</label>
                            <input type="float" name="base" size="5" placeholder="Base" value="<?php echo !empty($base)?$base:'';?>"/>
                        </div>
                        <br/>
                        <div>
                        <label>Altura (use ponto ao invés de vírgula):</label>
                            <input type="float" name="altura" size="5" placeholder="Altura" value="<?php echo !empty($altura)?$altura:'';?>"/>
                        </div>
                        <br/>
                        <div>
                        <label>Cozinha</label>
                            <input type="hidden" name="cozinha" value="0" />
                            <input type="checkbox" name="cozinha" value="1" <?php if ($cozinha == 1){echo "checked";} ?>/>
                        </div>
                        <div>
                        <label>Sala</label>
                            <input type="hidden" name="sala" value="0" />
                            <input type="checkbox" name="sala" value="1" <?php if ($sala == 1){echo "checked";} ?>/>
                        </div>
                        <div>
                        <label>Banheiro</label>
                            <input type="hidden" name="banheiro" value="0" />
                            <input type="checkbox" name="banheiro" value="1" <?php if ($banheiro == 1){echo "checked";} ?>/>
                        </div>
                        <div>
                        <label>Quarto</label>
                            <input type="hidden" name="quarto" value="0" />
                            <input type="checkbox" name="quarto" value="1" <?php if ($quarto == 1){echo "checked";} ?>/>
                        </div>
                        <div>
                        <label>Área Externa Coberta</label>
                            <input type="hidden" name="areaext_cob" value="0" />
                            <input type="checkbox" name="areaext_cob" value="1" <?php if ($areaext_cob == 1){echo "checked";} ?>/>
                        </div>
                        <div>
                        <label>Área Externa Não Coberta</label>
                            <input type="hidden" name="areaext_ncob" value="0" />
                            <input type="checkbox" name="areaext_ncob" value="1" <?php if ($areaext_ncob == 1){echo "checked";} ?>/>
                        </div>
                        <br/>
                        <div>
                            <label>Cor Predominante:</label>
                                <input name="cor" type="text"  placeholder="Cor" value="<?php echo !empty($cor)?$cor:'';?>">
                        </div>
                        <br/>
                        <div>
                            <label>Quantidade por Caixa:</label>
                                <input name="qtdadexcaixa" type="number"  placeholder="Qtdade X Caixa" value="<?php echo !empty($qtdadexcaixa)?$qtdadexcaixa:'';?>">
                        </div>
                        <br/>
                        <div>
                            <label>Preço:</label>
                                <input type="float" name="preco" size="5" placeholder="Preço" value="<?php echo !empty($preco)?$preco:'';?>"/>
                        </div>
                        <br/>
                        
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualizar</button>
                          <br/><br/>
                          
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>