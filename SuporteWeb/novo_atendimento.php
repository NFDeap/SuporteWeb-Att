<?php include_once 'cabecalho.php'; ?>

<!-- Valida loja Selecionada -->

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

<!-- Novo Atendimento -->
	<div class="container-fluid">	

        <div class="row">

            <div class="col-md-6">
				
				<form class="text-center" name="formNovoAtendimento" method="post" action="valida_atendimento.php">
					
                    <div class="card text-left">
						
                            <div class="card-header">
                            </div>
                           
						    <div class="card-body">			                                                

                                <h5 class="card-title alert alert-primary text-center">
                                    <strong>Novo Atendimento</strong>
                                </h5>
                            
                                <div class="text-left">  
						        <!-- <p class="card-text">   -->                       					                                                                              
                            
                                        &nbsp;&nbsp;
                                        <label for="id_loja">
                                            <strong>Loja:</strong>
                                        </label>

                                        <a href="busca_lojas.php">
                                        <button type="button" id="busca_lojas" name="busca_lojas" class="btn btn-sm btn-outline-success">
                                        <i class="fa fa-bolt"></i>
                                            Buscar Lojas
                                        </button>    
                                        </a>

                                        <input class="form-control" type="text" readonly id="razao_social" name="razao_social" class="form-control mb-4"
                                        value="<?php echo $razao; ?>" /> 

                                        <br>  

                                    <div class="form-row">
                            
                                        <div class="col">
                                        &nbsp;&nbsp;
                                        <label for="nome_cliente">
                                            <strong>Nome Cliente:</strong>
                                        </label>
                                        <input class="form-control md-4" type="text" id="nome_cliente" name="nome_cliente" class="form-control mb-4" maxlength="20" required />
                                        </div>
                                        


                                        <div class="col">
                                         &nbsp;&nbsp;
                                        <label for="tel_contato">
                                            <strong>Tel Contato:</strong>
                                        </label>
                                        <select class="form-control" type="text" id="tel_contato" name="tel_contato" class="form-control mb-4">
                                            <option value=""> Selecione... </option>
                                            <?php                                         
                                                $id_loja = $crud->limpaTexto($_GET['id_loja']);
                                                $dadosCombo = $crud->getDados("SELECT id_tel_contato, tel_contato FROM atm_tel_contato INNER JOIN atm_lojas ON atm_tel_contato.id_loja = atm_lojas.id_loja WHERE atm_lojas.id_loja = $id_loja "); 
                                                foreach ($dadosCombo as $key => $linha) {
										        echo "<option value=".$linha['id_tel_contato'].">".$linha['tel_contato']."</option>";									 
                                                } 
                                               
                                            ?>
                                        </select>
                                        </div>


<!--                                         <div class="col">
                                         &nbsp;&nbsp;
                                        <label for="tel_contato">
                                            <strong>Tel Contato:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="tel_contato" name="tel_contato" class="form-control mb-4" maxlength="16" />      
                                        </div> -->

                                        <div class="col">
                                        &nbsp;&nbsp;
                                        <label for="ticket_relacionado">
                                            <strong>Ticket Relacionado:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="ticket_relacionado" name="ticket_relacionado" class="form-control mb-4" maxlength="20" />                                                                    
                                        </div>

                                    </div>
                                            
                                        <br>   

                                        &nbsp;&nbsp;
                                        <label for="assunto">
                                            <strong>Assunto:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="assunto" name="assunto" class="form-control mb-4" maxlength="50" />

                                        <br>

                                                    
                                        <div class="form-group">
                                        &nbsp;&nbsp;
                                        <label for="descricao_atendimento">
                                            <strong>Descrição:</strong>
                                        </label>
                                        <textarea class="form-control rounded-0" id="descricao_atendimento" name="descricao_atendimento" maxlength="1000" rows="10"></textarea>
                                        </div>
                            
                                        <br>   

                                        <br> 
                                        
                                        <!-- Situacao| Radio input-->	
                                        &nbsp;&nbsp;
                                        <label for="situacao">
                                        <strong>Situação:</strong>
                                        </label>
                                        <br>
                                        <input type="radio" id="status1" name="status" value="1" checked>                                        
                                        <label class="form-check-label" for="status1">
						                Aberto
					                    </label>
                                        
                                        <br>

                                        <input type="radio" name="status" id="status0" value="0">
                                        <label class="form-check-label" for="status0">
                                        Fechado
                                        </label>

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
                                        <a href="valida_atendimento.php">
                                        <button type="submit" value="1" id="salvar_atendimento" name="salvar_atendimento" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-bolt"></i>
                                            Salvar
                                        </button>    
                                        </a>
                                        </div>

                                    </div>
                                </div>

                            </div>

                    </div>

                </form>

            </div>
        </div>
    </div>



            
<?php include_once 'rodape.php'; ?>