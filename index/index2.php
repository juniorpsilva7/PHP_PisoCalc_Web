<?php
//PEGA DATA ATUAL
$datacorrente = date('Y-m-d');
$page = $_SERVER['REQUEST_URI'];

// CALCULO DA AREA ESCOLHIDA
$tipoarea = $_POST['tipoarea'];
$base2 = $_POST['base'];
$altura2 = $_POST['altura'];
$raio = $_POST['raio'];
$areatotal = $_POST['areatotal'];
$arearet = $base2*$altura2;
$areacirc = 3.14*($raio*$raio);
if ($tipoarea == 'Retangular'){
    $areafinal = $arearet;
}else if ($tipoarea == 'Circular'){
    $areafinal = $areacirc;
}else{
    $areafinal = $areatotal;
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
            
            <h4>Área Escolhida: <?php echo $tipoarea ?> </h4>
            <h5>Área aprox: <?php echo $areafinal ?> m²</h5>
            <a class="btn btn-default" href="index.php">Mudar</a><br/>
            
            <br/>
            <h4>Escolha os pisos:</h4>
            <form class="form-horizontal" action="index3.php" method="post" enctype="multipart/form-data">
                <?php include('../piso/list.php'); ?>
                
                <input type='hidden' name='tipoarea' value='<?php echo $tipoarea ?>' />
                <input type='hidden' name='areafinal' value='<?php echo $areafinal ?>' />
                
                <!--   BOTÃO SUBMIT   -->
                <div align="center" class="form-actions">
                    <button class="btn btn-success" type="submit">Consultar</button>                
                </div>
            </form>
            
            
            <?php // echo $page; ?>
        </div>
    </body>
</html>
