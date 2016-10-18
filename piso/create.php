<?php

require '../db/database.php';

$valid = true;

if ( !empty($_POST)) {

    //$fornecedor = $_POST['fornecedor'];
    //
    //Atributos da imagem que foi passada
//    $imagem = $_FILES["imagem"];
    $arquivo_tmp = $_FILES['imagem']['tmp_name'];
    $nome = $_FILES['imagem']['name'];
    // Pega a extensao
    $extensao = strrchr($nome, '.');
    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfilero as extesões permitidas e separo por ';'
    // Isso server apenas para eu poder pesquisar dentro desta String
    if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
	{
		// Cria um nome único para esta imagem
		// Evita que duplique as imagens no servidor.
		$novoNome = md5(microtime()) . $extensao;
		
		// Concatena a pasta com o nome
		$destino = '../fotos/' . $novoNome; 
		
		// tenta mover o arquivo para o destino
		@move_uploaded_file( $arquivo_tmp, $destino  );
	}
	else{
            echo '<script language="javascript">';
            echo 'alert("Você poderá enviar apenas arquivos \'*.jpg;*.jpeg;*.gif;*.png\' ");';
            echo 'window.location.href = "../piso/create.php";';
            echo '</script>';
        }
        

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

        $sql = "INSERT INTO piso (fornecedor_idFornecedor, foto2, base, altura, cozinha, sala, banheiro, quarto, areaext_cob, areaext_ncob, cor, qtdadexcaixa, preco) 
                values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $q = $pdo->prepare($sql);
        $q->execute(array(1, $destino, $base, $altura, $cozinha, $sala, $banheiro, $quarto, $areaext_cob, $areaext_ncob, $cor, $qtdadexcaixa, $preco));
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
<?php include ('../layout/headerlogado.php'); ?>
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
                <label>Cor ou Textura Predominante:</label>
                <!--azul, vermelho, amarelo, verde, marrom, preto-->
                <select name="cor" class="selectpicker">
                  <optgroup>  
                      <option value="azul">Azul</option>
                      <option value="vermelho">Vermelho</option>
                      <option value="amarelo">Amarelo</option>
                      <option value="verde">Verde</option>
                      <option value="marrom">Marrom</option>
                      <option value="preto">Preto</option>
                  </optgroup>
                </select>          
                <!--<input name="cor" type="text"  placeholder="Cor ou Textura">-->
            </div>
            
            <br/>
            <div>
                <label>Quantidade por Caixa:</label>
                    <input name="qtdadexcaixa" type="number"  placeholder="Qtdade X Caixa">
            </div>
            <br/>
            <div>
                <label>Preço por caixa:</label>
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
