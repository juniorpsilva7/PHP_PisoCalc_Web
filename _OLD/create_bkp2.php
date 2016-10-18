<?php

require '../db/database.php';

$valid = true;

if ( !empty($_POST)) {

    //$fornecedor = $_POST['fornecedor'];
    $imagem = $_FILES["imagem"];
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
    
    
    if ($valid) {
        $mysqlImg = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO piso (fornecedor_idFornecedor, foto, base, altura, cozinha, sala, banheiro, quarto, areaext_cob, areaext_ncob, cor, qtdadexcaixa, preco) 
                values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $q = $pdo->prepare($sql);
        $q->execute(array(1, $mysqlImg, $base, $altura, $cozinha, $sala, $banheiro, $quarto, $areaext_cob, $areaext_ncob, $cor, $qtdadexcaixa, $preco));
        unlink($nomeFinal);

        Database::disconnect();
        header("Location: index.php");
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />       
</head>
<?php include ('../layout/header.php'); ?>
<body>
    <div class="container">
        
        <a class="btn btn-default" href="index.php">Voltar ao Painel</a><br/><br/>
        
        <div class="col-xs-offset-1 col-md-6">
        <div class="bg-primary">
            <h3>Novo Piso</h3>
        </div>
        <br/>
        
        
        <!--INICIO DO FORMULARIO-->             
        <form class="form-horizontal" name="form1" action="create.php" method="post" enctype="multipart/form-data">
            
            <div>
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem"/>
		<br/>
            </div>
            <div>
            <label>Base (use ponto ao invés de vírgula):</label>
                <input type="float" name="base" size="5" placeholder="Base"/>
            </div>
            <br/>
            <div>
            <label>Altura (use ponto ao invés de vírgula):</label>
                <input type="float" name="altura" size="5" placeholder="Altura"/>
            </div>
            <br/>
            <div>
            <label>Cozinha</label>
                <input type="hidden" name="cozinha" value="0" />
                <input type="checkbox" name="cozinha" value="1" />
            </div>
            <div>
            <label>Sala</label>
                <input type="hidden" name="sala" value="0" />
                <input type="checkbox" name="sala" value="1" />
            </div>
            <div>
            <label>Banheiro</label>
                <input type="hidden" name="banheiro" value="0" />
                <input type="checkbox" name="banheiro" value="1" />
            </div>
            <div>
            <label>Quarto</label>
                <input type="hidden" name="quarto" value="0" />
                <input type="checkbox" name="quarto" value="1" />
            </div>
            <div>
            <label>Área Externa Coberta</label>
                <input type="hidden" name="areaext_cob" value="0" />
                <input type="checkbox" name="areaext_cob" value="1" />
            </div>
            <div>
            <label>Área Externa Não Coberta</label>
                <input type="hidden" name="areaext_ncob" value="0" />
                <input type="checkbox" name="areaext_ncob" value="1" />
            </div>
            <br/>
            <div>
                <label>Cor Predominante:</label>
                    <input name="cor" type="text"  placeholder="Cor">
            </div>
            <br/>
            <div>
                <label>Quantidade por Caixa:</label>
                    <input name="qtdadexcaixa" type="number"  placeholder="Qtdade X Caixa">
            </div>
            <br/>
            <div>
                <label>Preço:</label>
                    <input type="float" name="preco" size="5" placeholder="Preço"/>
            </div>
            
            
            
            
            <!--   BOTÃO SUBMIT   --><br/><br/>
            <div class="form-actions">
                <button class="btn btn-success" type="submit">Criar</button>                
            </div>
        </form>
        </div>
    </div>    
</body>
</html>
