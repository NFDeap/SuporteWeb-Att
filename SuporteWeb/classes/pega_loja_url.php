<?php include_once 'cabecalho.php'; ?>
<?php 

class UrlLojas extends Database{
//Pegar a razão Social
    public function getDadosLojas($valor) 
    {
        if (isset($_GET['id_loja'])){  //o id não é nulo?
            $crud = new Crud();
            //obtendo o ID da URL
            $id_loja = $crud->limpaTexto($_GET['id_loja']);
            
            //selecionamos os dados a partir do id informado
            $resultado = $crud->getDados("SELECT id_loja, razao_social FROM atm_lojas WHERE id_loja=$id_loja");    

            //Percorremos os dados obtidos
            foreach($resultado as $linha){
                $id_loja = $linha['id_loja'];   
                $razao_social = $linha['razao_social'];                    
            }
        }
        else{ 
            $razao_social = "Nenhuma loja informada! Selecione através do botão..."; 
            $id_loja = "Nenhuma loja informada! Selecione através do botão...";
        }
        //atribui ao getLojas o valor informado na estrutura

        if ($valor == 'razao'){    
        return $razao_social;
        }
        elseif($valor == 'id_loja'){
            return $id_loja;
        }
    }

}

?>