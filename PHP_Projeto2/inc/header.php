<?php

session_start();

if (!$_SESSION['autenticado']) {
	header('Location: login.php');
	die(0);
}else

?>
<!DOCTYPE html>		
<html>		
<head>		    
<meta charset="utf-8">		    
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		    
<title>Loja Virtual</title>		    
<meta name="description" content="">		    
<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">		
   

  <style>
  body {		            
  	padding-top: 50px;		            
  	padding-bottom: 20px;		        
  	}		    
  	</style>	

  	<!--<link rel="stylesheet" href="<?php //echo BASEURL; ?>css/style.css">-->	    
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">		
  	</head>	

  	<body>	

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">		      
    <div class="container">	
    <div class="navbar-header" style="float: right;">		          
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">		            
    <span class="sr-only">Toggle navigation</span>		            
    <span class="icon-bar"></span>		            
    <span class="icon-bar"></span>		            
    <span class="icon-bar"></span>		          
    </button>		          
    <a href="<?php echo BASEURL; ?>logout.php" id="sair" class="navbar-brand" onclick="sairConfirmar();">Logout</a>   	      
    </div>

    <div class="navbar-header" style="float: left;">             
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">                
    <span class="sr-only">Toggle navigation</span>                
    <span class="icon-bar"></span>                
    <span class="icon-bar"></span>                
    <span class="icon-bar"></span>              
    </button> 
    <a href="<?php echo BASEURL; ?>index.php" class="navbar-brand">Cadastro de Produtos</a>             
    </div>

  <!--  <div id="navbar" class="navbar-collapse collapse" style="float: ;>		          
    	<ul class="nav navbar-nav">          		            
   			<li class="dropdown">		                
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">		                    Produtos <span class="caret"></span></a>		                
    			<ul class="dropdown-menu">		                    
    				<li><a href="<?php echo BASEURL; ?>products">Gerenciar Produtos</a></li>		                    
    				<li><a href="<?php echo BASEURL; ?>products/add.php">Novo Produto</a></li>		                
    			</ul>		            
   			 </li>		          
    	</ul>		        
    </div>
    <!--/.navbar-collapse -->		      
    </div>		    
    </nav>		
    <main class="container">

    <script>
      function sairConfirmar(){
       var c = confirm("você realmente deseja sair da página de cadastro?");
        if(c != true)
          $("#sair").attr("href", "/PHP_Projeto2/index.php");        
      }

    </script>