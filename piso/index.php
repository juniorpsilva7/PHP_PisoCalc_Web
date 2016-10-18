<?php $page = $_SERVER['REQUEST_URI']; 
include '../db/database.php';
include('../login/config.php');
include('../login/verifica_login.php');
include('../login/redirect.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />     
</head>

<?php include ('../layout/headerlogado.php'); ?>

<body>
    <div class="container">
    <h2>Gerenciar Pisos</h2>
    <h3>Painel do Administrador</h3>
    <a class="btn btn-default" href="../piso/create.php"> + Criar Novo Piso</a>
    <br/><br/>
    
    
        <br/><br/>
            <div>
                <!--<table class="table table-striped table-bordered">-->
                <table class="table table-bordered table-hover">
                  <thead bgcolor="#D3D3D3">
                    <tr>
                      <th>Imagem</th>
                      <th>Fornecedor</th>
                      <th>Base</th>
                      <th>Altura</th>
                      <th>Cor</th>
                      <th>Qtdade X Caixa</th>
                      <th>m2 por Cx</th>
                      <th>Preço</th>   
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                   <?php
                   
                   $pdo_index = Database::connect();
                   $prepara = $pdo_index->prepare('SELECT * FROM piso');
                   $prepara->execute();
                   while ( $row = $prepara->fetch()) {
                       $idPiso = $row['idPiso'];
                       echo "<td><img src="
                                ."'".$row['foto2']."'"
                               ."\></td>";
//                       echo "<td><img src='getImagem.php?PicNum=$idPiso' \"></td>"; 
//                        echo '<td>'
//                                . '<img src="data:image/jpg;base64,' . base64_encode($row['foto']) . '" width="80" height="80">'
//                                . '</td>';
                        echo '<td>'. $row['Fornecedor_idFornecedor'] . '</td>';
                        echo '<td>'. $row['base'] . '</td>';
                        echo '<td>'. $row['altura'] . '</td>';
                        echo '<td>'. $row['cor'] . '</td>';
                        echo '<td>'. $row['qtdadexcaixa'] . '</td>';
                        
                        $base = $row['base'];
                        $altura = $row['altura'];
                        $area = $base * $altura;
                        $areaxcaixa = $area * $row['qtdadexcaixa'];
                        
                        echo '<td>'.$areaxcaixa.'</td>';
                        
                        echo '<td>'. $row['preco'] . '</td>';
                        echo '<td width=250 align="center">';
//                        echo '<a class="btn" href="calls/read.php?id='.$row['idPiso'].'">Read</a>';
//                        echo ' ';
                        echo '<a id="actionbtn" class="btn btn-success" href="../piso/update.php?id='.$row['idPiso'].'">Update</a>';
                        echo ' ';
                        echo '<a id="actionbtn" class="btn btn-danger" href="delete.php?id='.$row['idPiso'].'">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                   }
                   Database::disconnect();
                  ?>   
                      
                  </tbody>
            </table>
        </div>
        <br/><br/>
<?php // echo $page; ?>

    </div> <!-- /container -->

  </body>
</html>