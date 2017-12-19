<?php
require_once('functions.php');        

?>  

<?php $db = open_database(); ?>

<?php

session_start();

  $total = 0;

if (!isset($_SESSION['carrinho'])) {
  # criando um carrinho de compras com PHP
  $_SESSION['carrinho'] = array();
};

if (isset($_GET['acao'])) {
  
  if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        }else{
          $_SESSION['carrinho'][$id] += 1;
      }
    } 


//remover
  if ($_GET['acao'] == 'del'){
    $id = intval($_GET['id']);
     if (isset($_SESSION['carrinho'][$id])){
       unset($_SESSION['carrinho'][$id]);
     }

  }

//alterar quantidade
    if ($_GET['acao'] == 'up'){

      if (is_array($_POST['prod'])) {
        foreach ($_POST['prod'] as $id => $qtd) {
          $id = intval($id);
          $qtd = intval($qtd);
          if(!empty($qtd) || $qtd <> 0){
            $_SESSION['carrinho'][$id] = $qtd;
          }else{
          unset($_SESSION['carrinho'][$id]);
        }
      } 
    }
  }

};

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carrinho</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../home.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">
        <small>Carrinho</small>
      </h1>

            <?php
        if (count($_SESSION['carrinho']) == 0) {
          ?>

      <!-- Sem produtos -->
      <div class="row">
        <div class="col-md-2">
          <p>Não há produtos no carrinho</p>
        </div>
      </div>
      <!-- /.row -->
<?php

}else{
  foreach ($_SESSION['carrinho'] as $id => $qtd) {
    view($id);
    $sub = $product['valor'] * $qtd;
    $total += $sub; 
?>     
      <!-- Project One -->
  <form action="?acao=up" method="POST">
      <div class="row">
        <div class="col-md-2">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h2><?php echo $product['nome']; ?></h2>          
        </div>
        <div class="col-md-2" align="center">
        <input style="width: 50px; text-align: center;" type="number" name="prod[<?php echo $id ?>]" value="<?php echo $qtd ?>" />
        <p>Quantidade</p>
<!--        <button type="submit" class="btn btn-default" aria-label="Left Align" onclick="subt();">
         <span class="glyphicon glyphicon-plus-sign"></span>
        </button>
        <button type="submit" class="btn btn-default" aria-label="Left Align" onclick="soma();">
         <span class="glyphicon glyphicon-minus-sign"></span>
        </button>-->         
        </div>
        <div class="col-md-2" align="center">
          <h3>R$<?php echo $sub; ?></h3>
          <p>Sub Total</p> 
          <input type="submit" class="btn btn-primary" value="Atualizar" />
        </div>
        <div class="col-md-2">
          <h3>R$<?php echo $product['valor']; ?></h3>
          <p>Unidade</p> 
        </div>
        <div class="col-md-5">
        <a class="btn btn-primary"  href="?acao=del&id=<?php echo $id ?>">Excluir</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>

<?php 
  }

}
?>
      <!-- /.row -->
       <div class="col-md-2">          
          <h3>R$<?php echo $total; ?></h3>
          <p>Total</p>        
        </div>
          
</form>

      <hr>

      <!-- Pagination -->
      <div class="row">
        <div class="col-md-2">
          <p></p>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Douglas A. Z. Oliveira Grup Ecommerce 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
