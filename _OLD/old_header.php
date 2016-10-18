<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php $page = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<link   href="../css/bootstrap.min.css" rel="stylesheet">


<div class="navbar navbar-inverse navbar-fixed-top">
<!--    <div class="span4 offset2">
    Imagem
    </div>-->

<!--      <div class="navbar-inner">
        <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar">MENU</span>
        </button>-->

          <div class="nav-collapse collapse">
            <ul class="nav">

              <li <?php echo ($page == '/piso1.0/index/index.php') ? 'class="active"' : '';?> ><a href="../index.php">Home</a></li>
              <li <?php echo ($page == '/piso1.0/piso/index.php') ? 'class="active"' : '';?> ><a href="../piso/index.php">Painel do Adm (vai ter controle de User)</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
</div>


<script src="http://localhost:8080/piso1.0/js/jquery-1.11.2.js"></script>
<script src="http://localhost:8080/piso1.0/js/bootstrap.js"></script>