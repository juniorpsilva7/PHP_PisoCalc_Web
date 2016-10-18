<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php $page = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<link   href="../css/bootstrap.min.css" rel="stylesheet">


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">PisoCalc</a>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php echo ($page == '/piso1.0/index/index.php') ? 'class="active"' : '';?> ><a href="../index.php">Home <span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li <?php echo ($page == '/piso1.0/piso/index.php') ? 'class="active"' : '';?> ><a href="../piso/index.php">Painel do Adm</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
    
        
        
    </div><!-- /.container-fluid -->    
</nav>


<script src="http://localhost:8080/piso1.0/js/jquery-1.11.2.js"></script>
<script src="http://localhost:8080/piso1.0/js/bootstrap.js"></script>