<?php 

require_once('./model/bd/livros.php');

function inserirLivros($dadosLivros){

    

    if(!empty($dadosLivros)) {

        if (!empty($dadosLivros[0]['nome']) && !empty($dadosLivros[0]['editora']) && !empty($dadosLivros[0]['idioma']) && !empty($dadosLivros[0]['autor']) && !empty($dadosLivros[0][' qtsPaginar']) &&  !empty($dadosLivros[0]['resumo'])) 
        {
                      
                $arrayDados = array(
                    "nome"          => $dadosLivros[0]['nome'],
                    "editora"       => $dadosLivros[0]['editora'],
                    "idioma"        => $dadosLivros[0]['idioma'],
                    "autor"         => $dadosLivros[0]['autor'],
                    " qtsPaginar"   => $dadosLivros[0][' qtsPaginar'],
                    "resumo"        => $dadosLivros[0]['resumo']
            );
          

            if (insertLivros($arrayDados))
            {
                return true;
            } else 
            {
                return array ('idErro' => 1, 'message' =>'Não foi possível inserir os dados');
            }

        }   else 
            {
                return array ('idErro' => 2, 'message' => 'Existem campos obrigatórios que não foram preenchidos');
            }
        }
    }

function listarLivraria(){

     require_once('model/bd/livros.php');

    //chama a funcao que vai buscar os dados no bd
    $dados = selectAllLivros();

    //
    if (!empty($dados))
        return $dados;
    else
        return false;
}















?>