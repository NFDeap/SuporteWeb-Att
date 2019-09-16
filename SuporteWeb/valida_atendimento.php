<?php include_once 'cabecalho.php'; ?>

<?php

//Carregando os arquivos necessários
include_once("classes/pega_loja_url.php");

//Instanciando os objetos a partir das classes
$urlLojas = new UrlLojas();

$idloja = $urlLojas->getDadosLojas('id_loja');
$idLoja = $_SESSION['sessionIdLoja'];
$idUsuario = $_SESSION['idUsuario'];



//obtendo os valores digitados no formulário
$razao_social = $crud->LimpaTexto($_POST['razao_social']);
$nome_cliente = $crud->LimpaTexto($_POST['nome_cliente']);
$tel_contato = $crud->LimpaTexto($_POST['tel_contato']);
$ticket_relacionado = $crud->LimpaTexto($_POST['ticket_relacionado']);
$assunto = $crud->LimpaTexto($_POST['assunto']);
$descricao_atendimento = $crud->LimpaTexto($_POST['descricao_atendimento']);  
$status = $crud->LimpaTexto($_POST['status']);


// Verificando se existe algum campo vazio
$msg = $validacoes->verifica_vazio($_POST, array('razao_social','nome_cliente','tel_contato','assunto','descricao_atendimento'));	
if($msg != null) {
    echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):',$msg,'danger');
    echo $validacoes->botaoVoltar('Voltar','danger');
} 	
else{
// Caso todos os campos estejam ok...	
    if(isset($_POST['salvar_atendimento'])){
    /*     $Data = new DateTime();
        $data = $Data->format('d/m/Y H:i:s'); */
        
        $insert = $crud->executarSql("insert into atm_atendimento (id_usuario, id_loja, status, id_tel_contato, ticket_relacionado, nome_cliente, assunto, descricao_atendimento) 
        values('$idUsuario','$idLoja','$status','$tel_contato','$ticket_relacionado','$nome_cliente','$assunto','$descricao_atendimento')");

        

        if($insert){
        echo $validacoes->mensagem('Tudo certo!', 'Atendimento Registrado.', 'success');    
        echo $validacoes->botao('Voltar para a listagem','success','corpo.php','reply');
        
        }
    } elseif(isset($_POST['alterar'])){
        $id_atendimento = $_SESSION['sessionIdAtm'];
        $update = $crud->executarSql("UPDATE atm_atendimento SET atm_atendimento.status='$status', atm_atendimento.nome_cliente='$nome_cliente', atm_atendimento.ticket_relacionado='$ticket_relacionado', atm_atendimento.assunto='$assunto', atm_atendimento.descricao_atendimento='$descricao_atendimento', atm_atendimento.data = Now() WHERE atm_atendimento.id_atendimento=$id_atendimento");
        if($update){//exibe a mensagem de sucesso		
            echo $validacoes->mensagem('Tudo Certo!','Registro <strong>alterado</strong> com sucesso','success');
            echo $validacoes->botao('Voltar para a Listagem', 'success', 'corpo.php', 'reply');		
        }
    }

}

unset($_SESSION['sessionIdLoja']);
unset($_SESSION['sessionIdAtm']);
?>

<?php include_once 'rodape.php'; ?>