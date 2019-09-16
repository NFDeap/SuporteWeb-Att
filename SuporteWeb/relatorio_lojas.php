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

    .   "ORDER BY atm_lojas_tel_contato.id_tel_lojas ASC";

    $resultado = $crud->getDados($query);
    
?>
<!-- card -->
    <div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Listagem de Lojas</h5>
    </div>
        
        <!-- <a href="#" onclick="imprimeDiv('relatorioLojas','Relatório de Lojas');return false;" class="btn btn-sm btn-outline-primary"><i class="material-icons vertical-align-middle">print</i> Imprimir</a>    -->
        
        <br>        
        <br>

            <!-- Tabela -->
            <div class="container-fluid" id="relatorioLojas">
                <div class="row">
                    <div class="col-md-12">
                        <table border="1" cellspacing="0"  width="100%"" class="table table-dark navbar-dark bg-dark" id="tabelaLojas" >        <!-- table table-dark navbar-dark bg-dark -->
                            <thead>
                            <tr>
                            <th>ID Loja</th>
                            <th>Razão Social</th>
                            <th>Fantasia</th>
                            <th>CNPJ</th>
                            <th>Franquia</th>
                            <th>Telefone</th>
                            </tr>
                            </thead>
                
                            <tbody>
                                <?php
                                //obtendo os dados em ordem alfabética
                                foreach ($resultado as $key => $linha){
                                echo "<tr>";			
                                echo "<td>" . $linha['id_loja'] . "</td>";
                                echo "<td>" . $linha['razao_social'] . "</td>";
                                echo "<td>" . $linha['fantasia'] . "</td>";
                                echo "<td>" . $linha['CNPJ'] . "</td>";        
                                echo "<td>" . $linha['franquia'] . "</td>";        
                                echo "<td>" . $linha['tel_contato'] . "</td>";                     
                                } 
                                ?>		
                                </tr>    
                            </tbody>
            
                        </table>
                    </div>
                </div>
            </div>

        <a href="corpo.php">
        <button type="button" id="voltar" name="voltar" class="btn btn-sm btn-outline-danger">
        <i class="fa fa-reply"></i>
            Voltar
        </button>    
        </a>

         <!-- Criando o DataTable da tabela -->
    <script>	
        /* Configurações para o Datatable na Tabela */		
        $(document).ready(function() {
        $('#tabelaLojas').DataTable({
                dom: 'Bfrtip',
            buttons: [
            {
                extend: 'print',
                text: 'Imprimir',
                exportOptions: {
                    columns: ':visible'
                },
            },
            'colvis'
        ],
        columnDefs: [ {
            targets: 0, //ocultamos a primeira coluna 
            visible: false
            } ],
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json",			
            buttons: {
                colvis: 'Selecionar Colunas'			
            }},
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
            });
        });	    
	</script> 


</div>
<?php include_once 'rodape.php'; ?>
