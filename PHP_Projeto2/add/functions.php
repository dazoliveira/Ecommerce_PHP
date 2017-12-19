<?php				

require_once('../config.php');		
require_once(DBAPI);				

$products = null;		
$product = null;				

/**		 *  Listagem de Produtos		 */		

function index() {			
	global $products;			
	$products = find_all('products');		
}

/**		 *  Cadastro de Produtos		 */		
function add() {

		

	if (!empty($_POST['product'])){

		$product = $_POST['product'];

		save('products', $product);

		header('location: index.php');
	}	

}

function edit(){

	  if (isset($_GET['id'])) {

	  	$id = $_GET['id'];

	  	if (isset($_POST['product'])) {	  			  	
	  	$product = $_POST['product'];

	  	update('products', $id, $product);
	  	header('location: index.php');
	  }else{

	  	global $product;
	  	$product = find('products', $id);
	  }

	 } else {
	  	header('location: index.php');
	  }
}

/**		 *  Visualização de um Produto		 */
function view($id = null){
	global $product;
	$product = find('products', $id);
}


function delete($id = null){
	  
	  global $product;		  
	  $product = remove('products', $id);				  

	  header('location: index.php');
}