

<?php include_once("cabecalho.php");?>	

<?php 

include_once("classes/pega_loja_url.php");
//instanciando o objeto
$urlLojas = new UrlLojas();
$razao = $urlLojas->getDadosLojas('razao');
$idLoja = $urlLojas->getDadosLojas('id_loja');


/* session_start(); */
$_SESSION['sessionIdLoja'] = $idLoja;
/* echo $_SESSION['sessionIdLoja']; */
/* var_dump ($razao); */

?>

<?php

if(isset($_GET['id_atendimento'])){
    //obtendo o ID da URL
    $id_atendimento = $_GET['id_atendimento'];
    $id_atendimento = $crud->limpaTexto($_GET['id_atendimento']);
    $_SESSION['sessionIdAtm'] = $id_atendimento;
    
	//Selecionando os dados a partir do ID informado
    $resultado = $crud->getDados("select "
    . "atm_atendimento.id_atendimento, "   
    . "if(status=1,'Em Andamento','Resolvído') AS status, " 
    . "atm_user.nome_usuario, "
    . "atm_lojas.id_loja, "
    . "atm_lojas.razao_social, "
    . "atm_lojas.franquia, " 
    . "atm_atendimento.nome_cliente, "    
    . "atm_atendimento.ticket_relacionado, "
    . "atm_atendimento.id_tel_contato, "
    . "atm_tel_contato.tel_contato, "
    . "atm_atendimento.assunto, "
    . "atm_atendimento.descricao_atendimento, "
    . "atm_atendimento.data "        
       
    . "FROM atm_atendimento "  
    . "INNER JOIN atm_lojas ON atm_atendimento.id_loja = atm_lojas.id_loja "
    . "INNER JOIN atm_user ON atm_atendimento.id_usuario = atm_user.id_usuario "
    . "INNER JOIN atm_tel_contato ON atm_atendimento.id_tel_contato = atm_tel_contato.id_tel_contato "

    . "WHERE id_atendimento = " . $id_atendimento 
);
    
    
    //Percorrendo os dados retornados    
    foreach ($resultado as $linha) {        
        $razao_social = $linha['razao_social'];
        $id_loja = $linha['id_loja'];
        $nome_cliente = $linha['nome_cliente'];
        $tel_contato = $linha['tel_contato'];	        	
		$ticket_relacionado = $linha['ticket_relacionado'];
		$assunto = $linha['assunto'];
        $descricao_atendimento = $linha['descricao_atendimento'];
        $status = $linha['status'];
	}
} 
/* var_dump($tel_contato); */

?>

<div class="container-fluid">	

<div class="row">

    <div class="col-md-6">
        
        <form class="text-center" name="formAtendimento" method="POST" action="valida_atendimento.php">
            
            <div class="card text-left">
                
                    <div class="card-header">
                    </div>
                   
                    <div class="card-body">			                                                

                        <h5 class="card-title alert alert-primary text-center">
                            <strong>Editar Atendimento</strong>
                        </h5>
                    
                        <div class="text-left">  
                        <!-- <p class="card-text">   -->                       					                                                                              
                    
                                &nbsp;&nbsp;
                                <label for="razao_social">
                                    <strong>Loja:</strong>
                                </label>

                                <input class="form-control" type="text" readonly id="razao_social" name="razao_social" class="form-control mb-4"
                                value="<?php echo "Razão Social: ".$razao_social . " || Código Loja: ".$id_loja ; ?>" /> 

                                <br>  

                            <div class="form-row">
                    
                                <div class="col">
                                &nbsp;&nbsp;
                                <label for="nome_cliente">
                                    <strong>Nome Cliente:</strong>
                                </label>
                                <input class="form-control md-4" type="text" id="nome_cliente" name="nome_cliente" class="form-control mb-4" maxlength="20" required 
                                value="<?php echo $nome_cliente; ?>" />
                                </div>
                                


                                <div class="col">
                                 &nbsp;&nbsp;
                                <label for="tel_contato">
                                    <strong>Tel Contato:</strong>
                                </label>
                                <select class="form-control" type="text" id="tel_contato" name="tel_contato" class="form-control mb-4">
                                    <option value=""> Selecione... </option>
                                    <?php                                         
                                        $id_atendimento = $crud->limpaTexto($_GET['id_atendimento']);
                                        $dadosCombo = $crud->getDados("SELECT id_tel_contato, tel_contato FROM atm_tel_contato INNER JOIN atm_lojas ON atm_tel_contato.id_loja = atm_lojas.id_loja WHERE atm_lojas.id_loja = $id_loja "); 
                                        foreach ($dadosCombo as $key => $linha) {
                                        echo "<option value=".$linha['id_tel_contato']." selected>".$linha['tel_contato']. "</option>";									 
                                        } 
                                        
                                    ?>
                                </select>
                                </div>

                                <div class="col">
                                &nbsp;&nbsp;
                                <label for="ticket_relacionado">
                                    <strong>Ticket Relacionado:</strong>
                                </label>
                                <input class="form-control" type="text" id="ticket_relacionado" name="ticket_relacionado" class="form-control mb-4" maxlength="20" 
                                value="<?php echo $ticket_relacionado; ?>" />                                                                    
                                </div>

                            </div>
                                    
                                <br>   

                                &nbsp;&nbsp;
                                <label for="assunto">
                                    <strong>Assunto:</strong>
                                </label>
                                <input class="form-control" type="text" id="assunto" name="assunto" class="form-control mb-4" maxlength="30" 
                                value="<?php echo $assunto; ?>" />

                                <br>

                                            
                                <div class="form-group">
                                &nbsp;&nbsp;
                                <label for="descricao_atendimento">
                                    <strong>Descrição:</strong>
                                </label>
                                <textarea class="form-control rounded-0" id="descricao_atendimento" name="descricao_atendimento" maxlength="1000" rows="10"
                                ><?php echo $descricao_atendimento; ?></textarea>
                                </div>                                                

                                <br> 
                                        
                                <!-- Situacao| Radio input-->	
                                &nbsp;&nbsp;
                                <label for="status">
                                <strong>Situação:</strong>
                                </label>
                                <br>
                                <input type="radio" id="status1" name="status" required value="1" <?php echo ($status == "1") ? "checked" : null; ?> >
                                <label class="form-check-label" for="status1">
						        Aberto
					            </label>                                        
                                <br>

                                <input type="radio" id="status0" name="status"  value="0" <?php echo ($status == "0") ? "checked" : null; ?> >
                                <label class="form-check-label" for="status0">
                                Fechado
                                </label>

                                <br> 
                                <br> 
                    
                        </div>

                        <div class="card-footer text-muted text-center">
                            <div class="row">

                                <div class="col">
                                <a href="corpo.php">
                                <button type="button" id="voltar" name="voltar" class="btn btn-sm btn-outline-danger">
                                <i class="fa fa-reply"></i>
                                    Voltar
                                </button>
                                </a>    
                                </div>

                                <div class="col">
                                
                                <button type="submit" id="salvar" name="alterar" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-bolt"></i>
                                    Salvar
                                </button>    
                                
                                </div>

                        
                            </div>
                        </div>

                    </div>

            </div>

        </form>

    </div>
</div>
</div>

<?php include_once("rodape.php"); ?>



