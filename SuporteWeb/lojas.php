<?php include_once 'cabecalho.php'; ?>

<?php //obtendo os dados em ordem descendente
    $query = "select "
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

    .   "ORDER BY atm_lojas.razao_social ASC";

    $resultado = $crud->getDados($query);
    
?>

<!-- card -->
   <div class="card border-info">
       <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Listagem de Lojas</h5>
   </div>

    <a href="cadastro_loja.php">
    <button type="button" id="cad_loja" name="cad_loja" class="btn btn-sm btn-outline-primary">
    <i class="fa fa-home"></i>
    Cadastrar Loja
    </button>    
    </a>

    <br>
    <br>

<!-- Tabela -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-dark navbar-dark bg-dark" id="tabelaLojas">
                <thead>
                    <tr>
                    <th>Razão Social</th>
                    <th>Fantasia</th>
                    <th>CNPJ</th>
                    <th>Franquia</th>
                    <th>Telefone</th>
                    <th>Opções</th>
                    </tr>
                </thead>	
                <tbody>
                    <?php
                    //obtendo os dados em ordem alfabética
                    foreach ($resultado as $key => $linha){
                    echo "<tr>";			
                    echo "<td>" . $linha['razao_social'] . "</td>";
                    echo "<td>" . $linha['fantasia'] . "</td>";
                    echo "<td>" . $linha['CNPJ'] . "</td>";        
                    echo "<td>" . $linha['franquia'] . "</td>";        
                    echo "<td>" . $linha['tel_contato'] . "</td>";        
                    echo "<td>				
                            <a href=\"edita_loja.php?id_loja=$linha[id_loja]\" class='btn btn-sm btn-outline-warning' title='Editar o registro corrente'><i class='material-icons vertical-align-middle'>edit</i> Editar</a>  				
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
           $('#tabelaLojas').DataTable({
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"},
			"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
          });
       });
</script> 


<!-- </div> -->

<?php include_once 'rodape.php'; ?>
