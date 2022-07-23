<?php 
   
function inserirLivros($dadosLivros){
  
    $id = $dadosLivros['id'];
    if(!empty($dadosLivros)) 
    {      
        
        if (!empty($dadosLivros['txtNome']) && !empty($dadosLivros['txtEditora']) && !empty($dadosLivros['txtIdioma']) && !empty($dadosLivros['txtAutor'])  && !empty($dadosLivros['txtQtspaginas']) && isset($dadosLivros['txtResumo'])) 
        {
         $arrayDados = array(
            "nome"          => $dadosLivros['txtNome'],
            "editora"       => $dadosLivros['txtEditora'],
            "idioma"        => $dadosLivros['txtIdioma'],
            "Autor"         => $dadosLivros['txtAutor'],
            "qtsPaginar"    => $dadosLivros['txtQtspaginas'],
            "resumo"        => $dadosLivros['txtResumo']
        ); 
        
       
     
        require_once('./model/bd/livros.php');
  
       
        if (insertLivros($arrayDados))  
                return true; 
                         
            else 
                return array ('idErro' => 1, 
                              'message'=>'Não foi possível inserir os dados');
                           
          } else 
                return array ('idErro' => 2,
                              'message'=> 'Existem campos obrigatórios que não foram preenchidos');

            
    }
 
}
function buscarID($id){

    if ($id != 0 && !empty($id) && is_numeric($id)){

        require_once './model/bd/livros.php';

        $dados = selectById($id);

        if (!empty($dados))  {
            return $dados;
        }else {
            return false;
        }
    }else
        return array(
            'idErro' => 4,
            'message' => 'Não é possível buscar um registro sem informar um Id válido'
        );
}
function listarLivraria(){
   
     require_once('model/bd/livros.php');
    
    $dados = selectAllLivros();


    if (!empty($dados))
        return $dados;
    else
        return false;
}

function excluirLivros($arrayDados)
{
  $id = $arrayDados['id'];

 if(!empty($id) && $id !=0 && is_numeric($id)){ 
   
      

    require_once('./model/bd/livros.php');

    if (deleteLivros($id))  
        return true; 
             
    else 
         return array ('idErro' => 3, 
                       'message'=>'Não foi possível excluir os dados');
               
  }else 
        return array ('idErro' => 4,
                      'message'=> 'Não é possível excluir um registro sem informar um Id válido');
        
 }
    


function atualizarLivros($dadosLivros, $id){
   

    $id = $dadosLivros['id'];
    
    if(!empty($dadosLivros)) 
    {      
       
        
        if (!empty($dadosLivros['txtNome']) && !empty($dadosLivros['txtEditora']) && !empty($dadosLivros['txtIdioma']) && empty($dadosLivros['txtAutor'])  && !empty($dadosLivros['txtQtspaginas']) && !empty($dadosLivros['txtResumo'])) 
        {
            if(!empty($id) && $id !=0 && is_numeric($id)){ 

                $arrayDados = array(
                    "id"            => $id,     
                    "nome"          => $dadosLivros['txtNome'],
                    "editora"       => $dadosLivros['txtEditora'],
                    "idioma"        => $dadosLivros['txtIdioma'],
                    "Autor"         => $dadosLivros['txtAutor'],
                    "qtsPaginar"    => $dadosLivros['txtQtspaginas'],
                    "resumo"        => $dadosLivros['txtResumo']
                ); 

                
        
     
        require_once('./model/bd/livros.php');
                
            if (updateLivros($arrayDados))  
                return true; 
                         
                else 
                return array ('idErro' => 1, 
                              'message'=>'Não foi possível atualizar os dados');
                           
          } else 
                return array ('idErro' => 2,
                              'message'=> 'Existem campos obrigatórios que não foram preenchidos');

        }
    }
 
}


