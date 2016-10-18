<?php
//PEGA DATA ATUAL
$datacorrente = date('Y-m-d');
$page = $_SERVER['REQUEST_URI'];

$tipoarea2 = $_POST['tipoarea'];
$areafinal2 = $_POST['areafinal'];

if (isset($_POST['pisos'])) { 
$pega_pisos = $_POST['pisos']; 
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link   href="../css/bootstrap.min.css" rel="stylesheet">
        <title></title>
    </head>
    
    <?php include ('../layout/header.php'); ?>
    
    
    <body>
        <div class="container">
            <div class="alert alert-success"><h2>Encontre o piso ideal para sua construção!!!</h2></div>
            
            <h4>Área Escolhida: <?php echo $tipoarea2 ?> </h4>
            <h5>Área aprox: <?php echo $areafinal2 ?> m²</h5>
            <a class="btn btn-default" href="index.php">Mudar</a><br/>
            
            <br/>
            <h4>Pisos Escolhidos:</h4>
            
            <div>
            <table class="table table-hover">
                <thead bgcolor="#D3D3D3">
                  <tr>
                    <th>Imagem</th>
                    <th>Cxs Necessárias</th>
                    <th>Preço Total</th>
                    <th>Sobra</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php
                  
                  include '../db/database.php';
                  $pdo_index = Database::connect();
                  $prepara = $pdo_index->prepare('SELECT * FROM piso where idPiso = ?');

                  //varrendo o array e imprimindo os pisos selecionados
                  for ($i=0; $i < count($pega_pisos) ; $i++) {
                    $id_do_Piso = $pega_pisos[$i];
                    $prepara->execute(array($id_do_Piso));
                    $row = $prepara->fetch();
                    
                    //Calculo de Variaveis Uteis
                    $base = $row['base'];
                    $altura = $row['altura'];
                    $precoxcaixa = $row['preco'];
                    $area = $base * $altura;
                    $areaxcaixa = $area * $row['qtdadexcaixa'];
                    
                    //Calculo de Qtdade de Caixas Necessarias
                    $cxs_necessarias = 0;
                    $areasomacxs = 0;
                    while ($areasomacxs <= $areafinal2){
                        $cxs_necessarias = $cxs_necessarias + 1;
                        $areasomacxs = $areasomacxs + $areaxcaixa;
                    }
                    
                    //Calculo da Sobra
                    $sobra = $areasomacxs - $areafinal2;
                    //Calculo do preço total
                    $precototal = $cxs_necessarias * $precoxcaixa;
                    
                    echo '<tr>';
                    echo "<td><img src="
                                ."'".$row['foto2']."'"
                               ."\></td>";
                    
                    echo '<td>'.$cxs_necessarias.'</td>';
                    echo '<td>R$ '.$precototal.'</td>';
                    echo '<td>'.$sobra.' m2</td>';
                    
                    echo '</tr>';

                  }
                  Database::disconnect();
                  ?>
                    
                </tbody>
            </table>
            </div>    
            <?php // echo $page; ?>
        </div>
    </body>
</html>
