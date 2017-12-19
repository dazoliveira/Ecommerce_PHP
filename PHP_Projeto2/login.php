<?php
require_once("conexao.inc.php");
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

session_start();

if (count($_POST) > 0) {

 $usuario = $_POST['user'];
 $senha = $_POST['senha'];



$sql = 'SELECT * FROM users 
        WHERE usuario = :usuario
        AND ativo = 1';

$stmt = $db->prepare($sql);
$stmt->execute(['usuario' => $usuario]);
$reg = $stmt->fetch();


if (count($reg) > 0){

    if ($reg['senha'] == md5($senha)) {
        $_SESSION['autenticado'] = true;
        header('Location: index.php');
        die(0);
    }
}

$_SESSION['autenticado'] = false;
 echo '<div style="color:white;" id="alerta" align="center"><h1>Erro na autenticação!</h1></div>';

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

    body{
        background-image:url('img/backgraund-login.jpg');
        background-repeat: no-repeat;
        margin: 0px;
        padding: 0px;        
    }

  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="login.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Digite nome de usuario" name="user">
            </div>
            <div class="form-group">
              <label for="psw"><span style="cursor: pointer;" class="glyphicon glyphicon-eye-open" onclick="verSenha();"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Digite sua senha" name="senha">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
        <a href="home.php" class="btn btn-danger btn-default pull-left"><span class="glyphicon glyphicon-remove"></span> Voltar</a>
          <!--<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>-->
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
var ativado = false;

$(document).ready(function(){
        $("#myModal").modal();    
});

function verSenha(){
 if (!ativado){ 
$("#psw").attr('type', 'text');
ativado = true;

}else {
  $("#psw").attr('type', 'password');
  ativado = false;
  }
}

</script>

</body>
</html>