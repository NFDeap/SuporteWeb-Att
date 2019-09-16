<?php include_once 'cabecalho.php'; ?>

<?php
include_once("classes/validacoes.php");
$validacoes = new Validacoes();


if(isset($_POST['id_usuario'])){
	$id_usuario = $crud->limpaTexto($_POST['id_usuario']);}; //O Isset verifica se veio o ID, pois na inclusão não existe.5
	$nome_usuario = $crud->limpaTexto($_POST['nome']);		
	$login = $crud->limpaTexto($_POST['login']);
	$email = $crud->limpaTexto($_POST['email']);
	$senha = $crud->limpaTexto($_POST['senha']);
    $confirma = $crud->limpaTexto($_POST['confirma']);
    $situacao = $crud->limpaTexto($_POST['situacao']);
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT); //Criptografa a senha utilizando um hash aleatório	
		
	$msg = $validacoes->verifica_vazio($_POST, array('nome','login','email','senha'));	
	$verifica_email = $validacoes->e_email($email);
	$compara_senha = $validacoes->comparaSenha($senha, $confirma);
	
	// Verificando se existe algum campo vazio
	if($msg != null) {
		echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):',$msg,'danger');
		echo $validacoes->botaoVoltar('Voltar','danger');
	} elseif (!$verifica_email) {
		echo $validacoes->mensagem('Ops!','O email informado é inválido!','danger');
		echo $validacoes->botaoVoltar('Voltar','danger');
	} elseif (!$compara_senha){
		echo $validacoes->mensagem('Ops!','A senha e a confirmação da senha informadas são diferentes!','danger');
		echo $validacoes->botaoVoltar('Voltar','danger');
	}		
	else { 
		// Caso todos os campos estejam ok...		
        if(isset($_POST['salvar'])) { 		
			//efetua o insert no SGBD	
			$insert = $crud->executarSql("INSERT INTO atm_user(nome_usuario, situacao, login, email, senha) VALUES ('$nome_usuario','$situacao','$login','$email','$senhaCriptografada')");
			if($insert){//exibe a mensagem de sucesso		
				echo $validacoes->mensagem('Tudo Certo!','Registro <strong>inserido</strong> com sucesso','success');
				echo $validacoes->botao('Voltar para a Listagem de Usuários', 'success', 'usuarios.php', 'reply');		
			}
		} elseif(isset($_POST['alterar'])) { 		
			//efetua o update no SGBD	
			$update = $crud->executarSql("UPDATE atm_user SET nome_usuario='$nome_usuario', situacao='$situacao', login='$login', email='$email', senha='$senhaCriptografada' WHERE id_usuario=$id_usuario");			
			if($update){//exibe a mensagem de sucesso		
				echo $validacoes->mensagem('Tudo Certo!','Registro <strong>Alterado</strong> com sucesso','success');
				echo $validacoes->botao('Voltar para a Listagem de Usuários', 'success', 'usuarios.php', 'reply');		
			}
		}
	}




?>

<?php include_once 'rodape.php'; ?>