
<?php include_once 'cabecalho.php' ?>
 
<!-- Cadastro de Lojas -->

<div class="container-fluid">	
    <div class="row">        
        <div class="col-md-6">
    		<form class="text-center" name="formCadLojas" method="post" action="valida_cad_lojas.php">
				<div class="card text">
					<div class="card-header">
					</div>
    			<div class="card-body">			                        
                    <h5 class="card-title alert alert-primary">
			        <strong>Nova Loja</strong>
			        </h5>

                   <div class="text-left">  
		            <p class="card-text">                            
                        <br>                                                    
                        &nbsp;&nbsp;
                        <label for="razao_social">
                        <strong>Razão Social:</strong>
                        </label>
                        <input class="form-control" type="text" id="razao_social" name="razao_social" class="form-control mb-4" maxlength="100" placeholder="Razão Social" required />
                        <br>  

                        &nbsp;&nbsp;
                        <label for="fantasia">
                        <strong>Fantasia:</strong>
                        </label>
                        <input class="form-control md-4" type="text" id="fantasia" name="fantasia" class="form-control mb-4" maxlength="50" placeholder="Fantasia" required />
                        <br>  

                        &nbsp;&nbsp;
                        <label for="CNPJ">
                        <strong>CNPJ:</strong>
                        </label>
                        <input class="form-control" type="text" id="CNPJ" name="CNPJ" class="form-control mb-4" maxlength="18" placeholder="99.999.999/0001-99" required 
                        title="Informe o CPF no formato 99.999.999/0001-99" pattern="[0-9]{2}[.][0-9]{3}[.][0-9]{3}[/][0-9]{4}[-][0-9]{2}"/>     
                        <br>  

                        &nbsp;&nbsp;
                        <label for="franquia">
                        <strong>Franquia:</strong>
                        </label>
                        <input class="form-control" type="text" id="franquia" name="franquia" class="form-control mb-4" maxlength="30" placeholder="Franquia" required />                                                                    
                        <br>  
            
                        &nbsp;&nbsp;
                        <label for="telefone">
                        <strong>Telefone:</strong>
                        </label>
                        <input id="telefone" name="telefone" type="text" placeholder="(99) 9999-9999" class="form-control" required maxlength="16" title="Informe o Telefone no formato (99) 9999-9999"  
                        pattern="\([0-9]{2}\) [0-9]{4}[-][0-9]{4}"/>
   
                    </p>
                   </div>
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
                        <button type="submit" id="salvar" name="salvar_loja" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-bolt"></i>
                        Salvar
                        </button>                                
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
    jQuery(function($){
      $("#telefone").mask("(99) 9999-9999");
      $("#CNPJ").mask("99.999.999/9999-99");
    })
   </script>

</div>
</div>
                
<?php include_once 'rodape.php'; ?>
