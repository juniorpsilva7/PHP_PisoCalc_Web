<?php
include '../db/database.php';

$PicNum = $_GET["PicNum"];

$pdo_index = Database::connect();
$prepara = $pdo_index->prepare('SELECT * FROM piso WHERE idPiso=?');
$prepara->execute(array($PicNum));
Header( "Content-Type: image/jpeg"); 
$row = $prepara->fetch();
    echo $row['foto'];
//    $image = $row['foto'];
//    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['foto'] ).'"/>';


?>
