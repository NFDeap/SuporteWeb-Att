<?php
//incluindo as classes necessárias
include_once("classes/crud.php");
//instanciando o objeto
$crud = new Crud();

header('Content-Type: text/html; charset=UTF-8');

if(empty($_SESSION)) {// Se a sessão ainda não foi iniciada
   session_start();
}

if(isset($_POST['login']))
{
	$email = $_POST['email'];
    $senha = $_POST['senha'];
	
	//Selecionando os dados a partir do ID informado
    $resultado = $crud->getDados("SELECT id_usuario, email, senha FROM atm_user WHERE email='$email'");         
	//Percorrendo os dados retornados
	foreach ($resultado as $linha) {
		$senhacriptografada = $linha['senha'];	
        $idUsuario = $linha['id_usuario'];			
	}
	     
        if(password_verify($senha , $senhacriptografada)) {
            $_SESSION['emailUsuario'] = $_POST['email'];
			$_SESSION['idUsuario'] = $idUsuario;
            header("Location: corpo.php");
            exit;
        } else {
            echo "<SCRIPT> 
                    alert('O usuário ou a senha informados são inválidos!');
                    location.href = 'index.php';     
                  </SCRIPT>";
       
	   
        }	
}

?>

