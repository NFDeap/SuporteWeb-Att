<?php include_once 'cabecalho.php'; ?>

<?php //obtendo os dados em ordem descendente    
    $query = "SELECT id_usuario, nome_usuario, login, email, if(situacao=1,'Disponível','Indisponível') as situacao FROM atm_user ORDER BY id_usuario DESC";
    $resultado = $crud->getDados($query);    
?>
<!-- card -->
	<div class="card border-info">
	<h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Listagem de Usuários</h5>
    </div>

   	<a href="adiciona_usuario.php">
	<button type="button" id="novo_usuario" name="novo_usuario" class="btn btn-sm btn-outline-primary">
    <i class="fa fa-user"></i>
	Novo Usuário
	</button>    
	</a>

	<br>
	<br>
	<!-- Tabela -->
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
				<table class="table table-dark navbar-dark bg-dark" id="tabelaUsuarios">
					<thead>
						<tr>
						<th>Login</th>
						<th>Email</th>
						<th>Situação</th>
						<th>Opções</th>
						</tr>
					</thead>
				
					<tbody>
						<?php
						//obtendo os dados em ordem alfabética
						foreach ($resultado as $key => $linha){
						echo "<tr>";			
						echo "<td>" . $linha['login'] . "</td>";
						echo "<td>" . $linha['email'] . "</td>";
						echo "<td>" . $linha['situacao'] . "</td>";        
						echo "<td>				
								<a href=\"edita_usuario.php?id_usuario=$linha[id_usuario]\" class='btn btn-sm btn-outline-warning' title='Editar o registro corrente'><i class='material-icons vertical-align-middle'>edit</i> Editar</a>  				
							</td>"; 			
						}
						?>			
						</tr>    
					</tbody>
			
				</table>	

				<a href="corpo.php">
				<button type="button" id="voltar" name="voltar" class="btn btn-sm btn-outline-danger">
				<i class="fa fa-reply"></i>
					Voltar
				</button>    
				</a>
			</div>
		</div>
	</div>

	<script>	
         /* Configurações para o Datatable na Tabela */		
		 $(document).ready(function() {
           $('#tabelaUsuarios').DataTable({
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"},
			"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
          });
       });
</script> 

<?php include_once 'rodape.php'; ?>


