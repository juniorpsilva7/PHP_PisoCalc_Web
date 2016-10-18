<?php
//PEGA DATA ATUAL
$datacorrente = date('Y-m-d');
$page = $_SERVER['REQUEST_URI'];

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
            <div class="alert alert-warning">
            <h3>Painel do Usuário</h3>
            <h5><p>Aqui será a primeira tela para o usuário sendo:</p>
                <p>1. Ele irá entrar com a área.</p>
                <p>2. Escolher os pisos</p>
                <p>3. Na segunda tela já irá trazer os parâmetros com os resultado descritos nos requisitos.</p>
            </h5>
            </div>
            
            <h4>Qual o tipo de Área?</h4>
            
            <form class="form-horizontal" action="index2.php" method="post" enctype="multipart/form-data">
                <div class="radio">
                        <div class="controls">
                            
                            <!--AREA RETANGULAR-->
                            <label class="radio"><input name="tipoarea" type="radio" value="Retangular">Retangular</label>
                            <label>Base (m):</label>
                                <input type="float" name="base" size="5" placeholder="Base"/>
                            <label>Altura (m):</label>
                                <input type="float" name="altura" size="5" placeholder="Altura"/>
                            
                            <br/><br/>                            
                            <!--AREA CIRCULAR-->
                            <label class="radio"><input name="tipoarea" type="radio" value="Circular">Circular</label>
                            <label>Raio (m):</label>
                                <input type="float" name="raio" size="5" placeholder="raio"/>
                            
                            <br/><br/>
                            <!--AREA IRREGULAR-->
                            <label class="radio"><input name="tipoarea" type="radio" value="Irregular">Irregular</label>
                            <label>Altura (m²):</label>
                                <input type="float" name="areatotal" size="5" placeholder="Area m2"/>
                            
                        </div>
                </div>
                
                <!--   BOTÃO SUBMIT   --><br/><br/>
                <div class="form-actions">
                    <button class="btn btn-success" type="submit">Escolher os Pisos</button>                
                </div>
            </form>
            
            <?php // echo $page; ?>
        </div>
    </body>
</html>
