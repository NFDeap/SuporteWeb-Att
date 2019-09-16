<?php include_once 'cabecalho.php'; ?>

<?php

//obtendo os valores digitados no formulário
/* $id_loja = $crud->limpaTexto($_GET['id_loja']); */
        
    /* var_dump($id_loja); */

$razao_social = $crud->LimpaTexto($_POST['razao_social']);
$fantasia = $crud->LimpaTexto($_POST['fantasia']);
$CNPJ = $crud->LimpaTexto($_POST['CNPJ']);
$franquia = $crud->LimpaTexto($_POST['franquia']);
$telefone = $crud->LimpaTexto($_POST['telefone']);

// Verificando se existe algum campo vazio
$msg = $validacoes->verifica_vazio($_POST, array('razao_social','fantasia','CNPJ','franquia','telefone'));	
if($msg != null) {
    echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):',$msg,'danger');
    echo $validacoes->botaoVoltar('Voltar','danger');
} 	
else{
    // Caso todos os campos estejam ok...	
    if(isset($_POST['salvar_loja'])){        
        //efetua o insert no banco
        //atm_lojas
        $insert = $crud->executarSql("insert into atm_lojas (razao_social,fantasia,CNPJ,franquia) 
        values('$razao_social','$fantasia','$CNPJ','$franquia')");

        //efetua select no banco na tab atm_lojas
        $query = "SELECT max(id_loja) FROM atm_lojas";
        $resultado = $crud->getDados($query);
        $result_id_loja = implode(' ' ,$resultado[0]);

        //efetua o insert no banco
        //atm_tel_contato
        $insert = $crud->executarSql("insert into atm_tel_contato (id_loja, tel_contato) 
        values('$result_id_loja', '$telefone')");

        //efetua select no banco na tab atm_tel_contato
        $query = "SELECT max(id_tel_contato) FROM atm_tel_contato";
        $resultado = $crud->getDados($query);
        $result_id_tel = implode(' ' ,$resultado[0]);

        //efetua o insert no banco
        //atm_lojas_tel
        $insert = $crud->executarSql("insert into atm_lojas_tel_contato (id_tel_contato, id_loja) 
        values('$result_id_loja','$result_id_tel')");

        if($insert){
            echo $validacoes->mensagem('Tudo certo!', 'Loja Registrada.', 'success');
            echo $validacoes->botao('Voltar para a listagem','success','lojas.php','reply');
            }
        } elseif(isset($_POST['alterar'])){
            $id_loja = $_SESSION['sessIdLoja'];            
                $update = $crud->executarSql("UPDATE atm_lojas SET atm_lojas.razao_social='$razao_social', atm_lojas.fantasia='$fantasia', atm_lojas.CNPJ='$CNPJ', atm_lojas.franquia='$franquia' WHERE atm_lojas.id_loja=$id_loja");
                $update = $crud->executarSql("UPDATE atm_tel_contato SET atm_tel_contato.tel_contato='$telefone' WHERE atm_tel_contato.id_loja=$id_loja");                

                if($update){//exibe a mensagem de sucesso		
                    echo $validacoes->mensagem('Tudo Certo!','Registro <strong>alterado</strong> com sucesso','success');
                    echo $validacoes->botao('Voltar para a Listagem', 'success', 'lojas.php', 'reply');		
                }
                unset($_SESSION['sessIdLoja']);

    }
    
}

?>

<?php include_once 'rodape.php'; ?>