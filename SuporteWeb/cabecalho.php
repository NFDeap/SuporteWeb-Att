<?php
if(empty($_SESSION)) {// Se a sessao não estiver iniciada, iniciaremos! }
   session_start();
}
if(!isset($_SESSION['idUsuario'])) { //Se ainda não estiver logado
   header("Location: index.php");// Enviamos para a página inicial
   exit;
}
?>

<?php
//incluindo as classes necessárias
include_once("classes/crud.php");
include_once("classes/validacoes.php");
//instanciando o objeto
$crud = new Crud();
$validacoes = new Validacoes();
?>


<!DOCTYPE html>
<html>

 <head>	

	<title>Suporte Web</title>
  
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Carregando o CSS do Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Carregando a fonte Material Design para visualização dos ícones do Google Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Carregando a fonte Orbitron do Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
  
  <!-- CSS do dataTable -->
  <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"> 
  <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
  <!-- CSS do jQueryUpload -->
  <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
  <!-- CSS do Editor de Texto jQuery TE -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.min.css" rel="stylesheet">

  <!-- Carregando as funções JS -->
  <script src="js/funcoes.js"></script>

  <!-- JS jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  <!-- JS dataTable -->
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>	
  
  <!-- JS dataTable Buttons -->
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>	<!-- Criação de Botões no Datatable -->
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>	<!-- Botão imprimir no Datatable -->
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>   <!-- Botão selecionar colunas no Datatable -->	
  
  <!-- JS do jQueryUpload -->
  <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>

  <!-- JS do Masked -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link href="node_modules/bootstrap/compiler/bootstrap.min.css" rel="stylesheet">
    
  <!-- Material Design Bootstrap -->
  <link href="node_modules/bootstrap/compiler/mdb.min.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/estilos.css">

  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->


 </head>
 
  <body onload="relogio()">
<!-- Menu de Navegação              Para ver outros exemplos de navbar, acesse: https://getbootstrap.com/docs/4.1/examples/navbars/ -->
	
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <a class="navbar-brand" href="corpo.php">Suporte Web</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Alternar Navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menuPrincipal">
        <ul class="navbar-nav mr-auto">         
            <a class="nav-link text-light" href="corpo.php" id="index"  aria-haspopup="true" aria-expanded="false"><i class="material-icons vertical-align-middle">home</i>&nbsp Início</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="menuCadastros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons vertical-align-middle">list</i>&nbsp Cadastros</a>
            <div class="dropdown-menu" aria-labelledby="menuCadastros">
              <a class="dropdown-item" href="usuarios.php"><i class="material-icons vertical-align-middle">person_pin</i> Usuários</a>
              <a class="dropdown-item" href="lojas.php"><i class="material-icons vertical-align-middle">bookmarks</i> Lojas</a>              
			        <!-- <a class="dropdown-item" href="#"><i class="material-icons vertical-align-middle">chat</i> Notícias</a>  -->
            </div>
          </li>
		      
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="menuCadastros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons vertical-align-middle">print</i>&nbsp Relatórios</a>
            <div class="dropdown-menu" aria-labelledby="menuCadastros">
              <a class="dropdown-item" href="relatorio_usuario.php"><i class="material-icons vertical-align-middle">person_pin</i> Listagem de Usuários</a>
              <a class="dropdown-item" href="relatorio_lojas.php"><i class="material-icons vertical-align-middle">bookmarks</i> Listagem de Lojas</a>              
            </div>
          </li>
		      
          <li class="nav-item">
            <a class="nav-link text-light" href="logout.php"><i class="material-icons vertical-align-middle">power_settings_new</i>&nbsp Logout</a>
          </li>
        
        </ul>
       
       <p class="text-light"><span id="hora"></span></p>

      </div>

    </nav>
    