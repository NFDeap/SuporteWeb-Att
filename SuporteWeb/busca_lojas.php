<?php include_once 'cabecalho.php'; ?>

<div class="container-fluid">

    <div class="card border-dark">
        <h5 class="card-header">
            <i class="material-icons">bookmarks</i>
            Listagem de Lojas
        </h5>
    </div>

<?php
    //efetua select no banco na tab atm_lojas
    $query = "SELECT * FROM atm_lojas ORDER BY id_loja DESC";
    $resultado = $crud->getDados($query);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-dark navbar-dark bg-dark" id="tabelaLojas">
                <thead>
                    <tr>
                    <th class="selecionar">Código</th>
                    <th class="selecionar">Razão Social</th>
                    <th class="selecionar">Fantasia</th>
                    <th class="selecionar">CNPJ</th>
                    <th class="selecionar">Franquia</th>
                    <th class="selecionar">Opções</th>
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
                    echo "<td>
                            <a  href=\"novo_atendimento.php?id_loja=$linha[id_loja]\" class='btn btn-sm btn-outline-success'>Selecionar Loja </a>";        
                    echo "</td>";
                    echo "</tr>";
                    }
                ?>
                </tbody>    
            </table>
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



    <a href="novo_atendimento.php">
    <button type="button" id="busca_lojas" name="busca_lojas" class="btn btn-sm btn-outline-danger">
    <i class="fa fa-bolt"></i>
    Voltar
    </button>    
    </a>


    <a href="cadastro_loja.php">
    <button type="button" id="cad_loja" name="cad_loja" class="btn btn-sm btn-outline-primary">
    <i class="fa fa-bolt"></i>
    Cadastrar Loja
    </button>    
    </a>

</div>





<?php include_once 'rodape.php'; ?>