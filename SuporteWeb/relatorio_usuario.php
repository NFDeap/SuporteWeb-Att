<?php include_once 'cabecalho.php'; ?>

<?php //obtendo os dados em ordem descendente
    $query = "SELECT id_usuario, nome_usuario, login, email, if(situacao=1,'Disponível','Indisponível') as situacao FROM atm_user ORDER BY id_usuario DESC";
    $resultado = $crud->getDados($query);
?>
<!-- card -->
    <div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Listagem de Usuários</h5>
    </div>
        
        <!-- <a href="#" onclick="imprimeDiv('relatorioUsuario','Relatório de Usuários');return false;" class="btn btn-sm btn-outline-primary"><i class="material-icons vertical-align-middle">print</i> Imprimir</a>    -->
        
        <br>        
        <br>

            <!-- Tabela -->
            <div class="container-fluid" id="relatorioUsuario">
                <div class="row">
                    <div class="col-md-12">
                        <table border="1" cellspacing="0"  width="100%" class="table table-dark navbar-dark bg-dark" id="tabelaUsuarios" >         
                        <!-- <table  bgcolor="#6C0000"> -->
                            <thead>
                                <tr>
                                <th>ID Usuário</th>
                                <th>Nome Usuário</th>
                                <th>Login</th>
                                <th>E-mail</th>
                                <th>Situação</th>		
                                </tr>
                            </thead>
                
                            <tbody>
                                <?php
                                //obtendo os dados em ordem alfabética
                                foreach ($resultado as $key => $linha){
                                echo "<tr>";			
                                echo "<td>" . $linha['id_usuario'] . "</td>";
                                echo "<td>" . $linha['nome_usuario'] . "</td>";
                                echo "<td>" . $linha['login'] . "</td>";
                                echo "<td>" . $linha['email'] . "</td>";
                                echo "<td>" . $linha['situacao'] . "</td>";                    
                                } 
                                ?>		
                                </tr>    
                            </tbody>
            
                        </table>
                    </div>
                </div>
            </div>
    <script>	
        /* Configurações para o Datatable na Tabela */		
        $(document).ready(function() {
        $('#tabelaUsuarios').DataTable({
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



        <a href="corpo.php">
        <button type="button" id="voltar" name="voltar" class="btn btn-sm btn-outline-danger">
        <i class="fa fa-reply"></i>
            Voltar
        </button>    
        </a>


</div>
<?php include_once 'rodape.php'; ?>
