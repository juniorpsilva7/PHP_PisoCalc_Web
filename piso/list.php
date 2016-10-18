<!DOCTYPE html>
<!--<html>-->
<!--<head>-->
    <!--<meta http-equiv="content-type" content="text/html; charset=utf-8" />-->     
<!--</head>-->

<!--<body>-->
    <div>
        <br/><br/>
            <div>
                <!--<table class="table table-striped table-bordered">-->
                <table class="table table-hover">
                  <thead bgcolor="#D3D3D3">
                    <tr>
                      <th> </th>  
                      <th>Imagem</th>
                      <th>Base</th>
                      <th>Altura</th>
                      <th>Cor</th>
                      <th>Qtdade X Caixa</th>
                      <th>m2 por Cx</th>
                      <th>Preço</th>   
                      <!--<th>Ações</th>-->
                    </tr>
                  </thead>
                  <tbody>
                   
                   <?php
                   $listadepisos[]='';
                   $i = 0;
                   
                   include '../db/database.php';
                   $pdo_index = Database::connect();
                   $prepara = $pdo_index->prepare('SELECT * FROM piso');
                   $prepara->execute();
                   while ( $row = $prepara->fetch()) {
                       
                       //Montar um array com os pisos e passar por SESSION
                       $listadepisos[$i]=$row['idPiso'];
                       $i = $i+1;
                       
                       echo '<tr>';
                       echo "<td width='10'><input type='checkbox' name='pisos[]' value='".$row['idPiso']."'/></td>";
                       
//                       echo "<td width='10'><input type='hidden' name='".$row['idPiso']."' value='0' />
//                            <input type='checkbox' name='".$row['idPiso']."' value='1' /></td>";
//                        echo '<td>'. $row['Fornecedor_idFornecedor'] . '</td>';
                       echo "<td><img src="
                                ."'".$row['foto2']."'"
                               ."\></td>";
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
                        echo '</tr>';
                   }
                   Database::disconnect();
                  ?>   
                      
                  </tbody>
            </table>
        </div>
        <br/><br/>

    </div> <!-- /container -->

<!--  </body>
</html>-->