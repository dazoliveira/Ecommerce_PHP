<?php		

require_once('functions.php');		    
index();

?>	

<?php $db = open_database(); ?>

<!DOCTYPE html>
<html>

  <head>

  <meta charset="utf-8">		    
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		    
    <title>Loja Virtual</title>
<meta name="description" content="">		    
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="add/carrinho.php">Carrinho<span id="itensCarrinho"></span>
                
              </a>
            </li>
            <li class="nav-item">
              <a id="myBtn" class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->

    <?php if ($db) : ?>	

      <div class="container">

            <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">Bem vindo a loja Virtual!</h1>
        <p class="lead">Lider no mercado à 110 anos!</p>
        <a href="#" class="btn btn-primary btn-lg">Fale conosco!</a>
      </header>

       <div class="row text-center">

	<?php if ($products) : ?>		
	<?php foreach ($products as $product) : ?>	
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title" name="<?php echo $product['nome']; ?>"><?php echo $product['nome']; ?></h4>
              <p class="card-text" name="<?php echo $product['valor']; ?>">R$<?php echo $product['valor']; ?></p>
            </div>
            <div class="card-footer">
              <a style="cursor: pointer;color: white;" onclick="addItem();" href="add/carrinho.php?acao=add&id=<?php echo $product['id']; ?>" class="btn btn-primary">Add. Carrinho</a> 
            </div>
          </div>
        </div>

	<?php endforeach; ?>	

<?php else : ?>	

	<div class="alert alert-danger" role="alert">				
		<p>Nenhum item foi encontrado!</p>		
	</div>

<?php endif; ?>	

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php else : ?>			
	<div class="alert alert-danger" role="alert">				
		<p>Não foi possível Conectar ao Banco de Dados!</p>		
	</div>
<?php endif; ?>		

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Douglas A. Z. de Oliveira Grup 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
  var itens = 0;

      function addItem(){  
        itens += 1;

        alert("Item adicionado no carrinho com sucesso!");
        $("#itensCarrinho").text(itens); 

      }

    </script>
  </body>

</html>

