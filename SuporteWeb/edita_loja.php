

<?php include_once 'cabecalho.php'; ?>


<!-- Carregando os dados para a alteração -->
<?php if(isset($_GET['id_loja'])){
	//obtendo o ID da URL
    $id_loja = $crud->limpaTexto($_GET['id_loja']);
    $_SESSION['sessIdLoja'] = $id_loja;
	//Selecionando os dados a partir do ID informado
    $resultado = $crud->getDados("select "
	.	"atm_lojas_tel_contato.id_tel_contato, "
    .	"atm_lojas_tel_contato.id_loja, "
    .	"atm_lojas.id_loja, "
	.	"atm_lojas.razao_social, "
	.	"atm_lojas.fantasia, "
	.	"atm_lojas.CNPJ, "
	.	"atm_lojas.franquia, "
    .   "atm_tel_contato.tel_contato "
        
	.   "FROM atm_lojas_tel_contato "
	.   "INNER JOIN atm_lojas ON atm_lojas_tel_contato.id_loja = atm_lojas.id_loja "
    .   "INNER JOIN atm_tel_contato ON atm_lojas_tel_contato.id_tel_contato = atm_tel_contato.id_tel_contato "

    .   "WHERE atm_lojas.id_loja = " . $id_loja);
    
    //Percorrendo os dados retornados    
    foreach ($resultado as $linha) { 
        $id_loja =$linha['id_loja'];
		$razao_social = $linha['razao_social'];		
		$fantasia = $linha['fantasia'];
		$CNPJ = $linha['CNPJ'];
        $franquia = $linha['franquia'];
        $telefone = $linha['tel_contato'];
	}
} 
?>

<div class="container-fluid">	

        <div class="row">        

            <div class="col-md-6">
				
				<form class="text-center" name="formCadLojas" method="post" action="valida_cad_lojas.php">
					<div class="card text">
						<div class="card-header">
						</div>
                           
						    <div class="card-body">			                        

                                <h5 class="card-title alert alert-primary">
							        <strong>Edita Loja</strong>
						        </h5>

                                <div class="text-left">  
						            <p class="card-text">                            
						                                                        
                                        <br>                                                    
                                        
                                        &nbsp;&nbsp;
                                        <label for="id_loja">
                                        <strong>ID Loja:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="id_loja" name="id_loja" class="form-control mb-4" readonly  required 
                                        value="<?php echo $id_loja ?>"/>

                                        <br> 
                                                                                        
                                
                                        &nbsp;&nbsp;
                                        <label for="razao_social">
                                        <strong>Razão Social:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="razao_social" name="razao_social" class="form-control mb-4" maxlength="100" placeholder="Razão Social"  required 
                                        value="<?php echo $razao_social ?>"/>

                                        <br>  

                                        &nbsp;&nbsp;
                                        <label for="fantasia">
                                        <strong>Fantasia:</strong>
                                        </label>
                                        <input class="form-control md-4" type="text" id="fantasia" name="fantasia" class="form-control mb-4" maxlength="50" placeholder="Fantasia" required 
                                        value="<?php echo $fantasia ?>" />
                                        

                                        <br>  

                                        &nbsp;&nbsp;
                                        <label for="CNPJ">
                                        <strong>CNPJ:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="CNPJ" name="CNPJ" class="form-control mb-4" maxlength="18" placeholder="99.999.999/0001-99" required 
                                        title="Informe o CPF no formato 99.999.999/0001-99" pattern="[0-9]{2}[.][0-9]{3}[.][0-9]{3}[/][0-9]{4}[-][0-9]{2}" value="<?php echo $CNPJ ?>"/>     

                                        <br>  
                                        
                                        &nbsp;&nbsp;
                                        <label for="franquia">
                                        <strong>Franquia:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="franquia" name="franquia" class="form-control mb-4" maxlength="30" placeholder="Franquia" required 
                                        value="<?php echo $franquia ?>" />
                                        
                                        <br>  
                                    
                                        &nbsp;&nbsp;
                                        <label for="telefone">
                                        <strong>Telefone:</strong>
                                        </label>
                                        <input id="telefone" name="telefone" type="text" placeholder="(99) 9999-9999" class="form-control" required maxlength="16" title="Informe o Telefone no formato (99) 9999-9999"  
                                        pattern="\([0-9]{2}\) [0-9]{4}[-][0-9]{4}" value="<?php echo $telefone ?>"/>
                                    </p>
                                </div>
                                

                            </div>


                        <div class="card-footer text-muted text-center">
                            <div class="row">

                            <div class="col">
                            <a href="lojas.php">
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
                </form>

            </div>
        </div>
    </div>
    <script>
    jQuery(function($){
      $("#telefone").mask("(99) 9999-9999");
      $("#CNPJ").mask("99.999.999/9999-99");
    })
   </script>


    </div>
                
<?php include_once 'rodape.php'; ?>
