

<?php include_once("cabecalho.php"); ?>

<!-- Carregando os dados para a alteração -->
<?php if(isset($_GET['id_usuario'])){
	//obtendo o ID da URL
    $id_usuario = $crud->limpaTexto($_GET['id_usuario']);
	//Selecionando os dados a partir do ID informado
    $resultado = $crud->getDados("SELECT * FROM atm_user WHERE id_usuario=$id_usuario");         
    
    //Percorrendo os dados retornados    
    foreach ($resultado as $linha) {
		$nome_usuario = $linha['nome_usuario'];		
		$email = $linha['email'];
		$login = $linha['login'];
		$situacao = $linha['situacao'];
	}
} ?>

<div class="container-fluid">	

        <div class="row">        

            <div class="col-md-6">
				
				<form class="text-center" name="formUsuario" method="post" action="valida_usuario.php">
					<div class="card text">
						<div class="card-header">
						</div>
                           
						    <div class="card-body">			                        

                                <h5 class="card-title alert alert-primary">
							        <strong>Edita Usuário</strong>
						        </h5>

                                <div class="text-left">  
						            <p class="card-text">                            
						
                                        <br>  
                                        
                                        <!-- ID Usuario | Readonly -->
                                        &nbsp;&nbsp;
                                        <label for="nome">
                                        <strong>ID Usuário:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="id_usuario" name="id_usuario" class="form-control mb-4" readonly
                                        value="<?php echo $id_usuario ?>" />

                                        <br>  

                                        <!-- Nome | Text input -->
                                        &nbsp;&nbsp;
                                        <label for="nome">
                                        <strong>Nome:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="nome" name="nome" class="form-control mb-4" maxlength="50" placeholder="Nome do Usuário" required 
                                        value="<?php echo $nome_usuario ?>" />

                                        <br>  

                                        <!-- Login | text input-->
                                        &nbsp;&nbsp;
                                        <label for="login">
                                        <strong>Login:</strong>
                                        </label>
                                        <input class="form-control" type="text" id="login" name="login" class="form-control mb-4" placeholder="Login do Usuário" maxlength="20" required 
                                        value="<?php echo $login ?>" />
                                                                            
                                        <br>  

                                        <!-- Email | Email input-->
                                        &nbsp;&nbsp;
                                        <label for="email">
                                        <strong>E-mail:</strong>
                                        </label>
                                        <input class="form-control md-4" type="email" id="email" name="email" class="form-control mb-4" placeholder="Email do Usuário" maxlength="50" required 
                                        value="<?php echo $email ?>" >                                        

                                        <br>  
                                        
                                        <!-- Senha | Password input-->
                                        &nbsp;&nbsp;
                                        <label for="senha">
                                        <strong>Senha:</strong>
                                        </label>
                                        <input class="form-control" type="password" id="senha" name="senha" class="form-control mb-4" placeholder="Senha do Usuário" maxlength="100" required />
                                        
                                        <br>  

                                        <!-- Confirmação da Senha | Password input-->
                                        &nbsp;&nbsp;
                                        <label for="confirma">
                                        <strong>Confirme sua Senha:</strong>
                                        </label>
                                        <input class="form-control" type="password" id="confirma" name="confirma" class="form-control mb-4" placeholder="Confirmação da Senha do Usuário" maxlength="100" required />
                                        
                                        <br> 
                                        
                                        <!-- Situacao| Radio input-->	
                                        &nbsp;&nbsp;
                                        <label for="situacao">
                                        <strong>Situação:</strong>
                                        </label>
                                        <br>
                                        <input type="radio" id="situacao1" name="situacao" value="1" <?php echo ($situacao == "1") ? "checked" : null; ?> >                                        
                                        <label class="form-check-label" for="situacao1">
						                Disponível
					                    </label>
                                        
                                        <br>

                                        <input type="radio" id="situacao0" name="situacao" value="0" <?php echo ($situacao == "0") ? "checked" : null; ?> >
                                        <label class="form-check-label" for="situacao0">
                                        Indisponível
                                        </label>

                                        <br> 
                                    
                                    </p>
                                </div>
                                

                            </div>


                        <div class="card-footer text-muted text-center">
                            <div class="row">

                            <div class="col">
                            <a href="usuarios.php">
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
    </div>

<?php include_once("rodape.php"); ?>

