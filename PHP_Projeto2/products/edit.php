<?php
require_once('functions.php'); 

edit();

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Produto</h2>

<form action="edit.php?id=<?php echo $product['id']; ?>" method="post" onsubmit="">
	<hr/>
	<div class="row">
		<div class="form-group col-md-7">
			<label for="name">Nome do produto</label>
			<input type="text" class="form-control" name="product['nome']" value="<?php echo $product['nome']; ?>" required>
		</div>
		
		<div class="form-group col-md-3">		      
		    <label for="campo2">Valor</label>		      
		    <input type="text" class="form-control" name="product['valor']" value="<?php echo $product['valor']; ?>" required>		    
		</div>	
    </div>

    <div id="actions" class="row">		    
     	<div class="col-md-12">		      
     		<button type="submit" class="btn btn-primary">Salvar</button>		      
     		<a href="index.php" class="btn btn-default">Cancelar</a>		    
     	</div>		  
    </div>		
</form>

<?php include(FOOTER_TEMPLATE); ?>