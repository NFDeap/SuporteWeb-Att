
<!-- Filtro -->

    
	<div class="container-fluid">	

        <div class="row">

            <div class="col-md-3">
				
				<form class="text-center" name="formFiltro" method="post" action="valida_filtro.php">
					<div class="card text-center">
						<div class="card-header">

						</div>

						<div class="card-body">
						<a href="busca_lojas.php">
							<h5 class="shadowbox1 card-title alert alert-primary">
								<strong>Novo Atendimento</strong>
							</h5>
                        </a>
                        
                        <hr md-4>

                        <h5 class="card-title alert alert-dark">
							<strong>Filtro</strong>
						</h5>

						<p class="card-text">
                            
                        
                            &nbsp;&nbsp;
                            <label for="atendente">
                            <strong>Atendente:</strong>
                            </label>
                            <input class="form-control" type="text" id="atendente" name="atendente"
                            maxlength="25" />
                            <a href="valida_filtro.php?search=atendente">
							<button type="submit" id="atendente"><i class="fas fa-search"></i></button>
                            </a>
				        						                    
                            <br>
                            <br>
                        
                            &nbsp;&nbsp;
                            <label for="loja">
                            <strong>Loja:</strong>
                            </label>
                            <input class="form-control" type="text" id="loja" name="loja"
                            class="form-control mb-4" maxlength="30" />
                            <a href="valida_filtro.php?search=loja">
                            <button type="submit" id="loja"><i class="fas fa-search"></i></button>
                            </a>

                            <br>  
                            <br>

                            &nbsp;&nbsp;
                            <label for="nome_cliente">
                            <strong>Nome Cliente:</strong>
                            </label>
                            <input class="form-control" type="text" id="nome_cliente" name="nome_cliente"
                            class="form-control mb-4" maxlength="25" />
                            <a href="valida_filtro.php?search=nome_cliente">
                            <button type="submit" id="nome_cliente"><i class="fas fa-search"></i></button>
                            </a>

                            <br>  
                            <br>                                                                      
                        
                            &nbsp;&nbsp;
                            <label for="assunto">
                            <strong>Assunto:</strong>
                            </label>
                            <input class="form-control" type="text" id="assunto" name="assunto"
                            class="form-control mb-4" maxlength="35" />
                            <a href="valida_filtro.php?search=assunto">
                            <button type="submit" id="assunto"><i class="fas fa-search"></i></button>
                            </a>

                            <br>
                            <br>     

                        <hr md-4>     
                        <p class="card-text">                                                              
                        
                            &nbsp;&nbsp;
                            <label for="dataI">
                            <strong>Data Inicial:</strong>
                            </label>
                            <input class="form-control" type="date" id="dataI" name="dataI"
                            class="form-control mb-4">

                            <br>

                            &nbsp;&nbsp;
                            <label for="dataF">
                            <strong>Data Final:</strong>
                            </label>
                            <input class="form-control" type="date" id="dataF" name="dataF"
                            class="form-control mb-4">

                            <br>


                        </p>

                        </div>

                        <div class="card-footer text-muted">
                        <a href="valida_filtro.php">
                            <button type="submit" id="data" name="data" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-bolt"></i>
                                Buscar Por Data
                            </button>  
                        </a>  
                        </div>

                    </div>
                </form>

            </div>



            
