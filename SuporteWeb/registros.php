
<?php //obtendo os dados em ordem alfabética
    $query = "select "
    . "atm_atendimento.id_atendimento, "   
    . "if(status=1,'Aberto','Fechado') AS status, " 
    . "atm_user.nome_usuario, "
    . "atm_lojas.razao_social, "
    . "atm_lojas.franquia, " 
    . "atm_atendimento.nome_cliente, "    
    . "atm_atendimento.ticket_relacionado, "
    . "atm_atendimento.id_tel_contato, "
    . "atm_tel_contato.tel_contato, "
    . "atm_atendimento.assunto, "
    /* .  "atm_atendimento.data " */
    . "TIMESTAMP(atm_atendimento.data,'%d/%m/%y H:i:s') AS data "
       

    . "FROM atm_atendimento "  
    . "INNER JOIN atm_lojas ON atm_atendimento.id_loja = atm_lojas.id_loja "
    . "INNER JOIN atm_user ON atm_atendimento.id_usuario = atm_user.id_usuario "
    . "INNER JOIN atm_tel_contato ON atm_atendimento.id_tel_contato = atm_tel_contato.id_tel_contato "

    . "ORDER BY atm_atendimento.data DESC";
    
    $resultado = $crud->getDados($query);    
    /* DATE_FORMAT */
?>

<!-- var_dump($resultado);
    die(); -->
    
    <div class="col-md-9">
        <table class="table table-dark navbar-dark bg-dark" id="tabelaAtendimentos">
            <thead>        
                <tr>
                <th scope="col">ID Atendimento</th> 
                <th scope="col">Status</th>  
                <th scope="col">Atendente</th>   
                <th scope="col">Loja</th>   
                <th scope="col">Franquia</th>              
                <th scope="col">Cliente</th>
                <th scope="col">Telefone</th>
                <th scope="col">Assunto</th>
                <th scope="col">Data</th>                                                                         
                <th scope="col">Opções</th>
                </tr>        
            </thead>
            <tbody>
                <?php 
                foreach ($resultado as $key => $linha){
                    echo "<tr>";                
                    echo "<td>" . $linha['id_atendimento'] . "</td>"; 
                    echo "<td>" . $linha['status'] . "</td>";
                    echo "<td>" . $linha['nome_usuario'] . "</td>";  
                    echo "<td>" . $linha['razao_social'] . "</td>";
                    echo "<td>" . $linha['franquia'] . "</td>";           
                    echo "<td>" . $linha['nome_cliente'] . "</td>";
                    echo "<td>" . $linha['tel_contato'] . "</td>";
                    echo "<td>" . $linha['assunto'] . "</td>";
                    echo "<td>" . $linha['data'] . "</td>";                                                                
                    echo "<td>
                        <a href=\"edita_atendimento.php?id_atendimento=$linha[id_atendimento]\" class='btn btn-sm btn-outline-warning' title='Editar o registro corrente'><i class='material-icons vertical-align-middle'>edit</i> Editar</a>  
                        </td>";		
                    echo "</tr>";                
                } 
                ?>
            </tbody>
        
        </table>  



    </div>
    
<script>	
    /* Configurações para o Datatable na Tabela */		
    $(document).ready(function() {
    $('#tabelaAtendimentos').DataTable({
    "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"},
    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
    });
});
</script> 
            </div>
        </div>
    </div>

