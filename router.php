<?php


$action = (string) null;
$component = (string) null;



if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {


    $component = strtoupper($_GET['component']);
    $action = strtoupper($_GET['action']);

    //estrutura condicional para validar quem esta solicitando algo para o router
    switch ($component) {

        case 'LIVROS':

            require_once('./controller/controllerLivraria.php');


            if ($action == 'INSERIR') {
                $resposta = inserirLivros($_POST);
                
                if (is_bool($resposta)) { //se for bolleano

                    //Verificar se o retorno foi verdadeiro
                    if ($resposta)
                        echo ("<script>
                        alert('Registro inserido com sucesso');
                        window.location.href = 'index.php';
                            </script>");

                    //Se o retorno foi array significa que houve um erro no processo de inserção
                } elseif (is_array($resposta))
                    echo ("<script>
                        alert('" . $resposta['message'] . "');
                        window.history.back();
                         </script>");
                        
            }

            elseif ($action == 'DELETAR') {

                $id = $_GET['id'];

                
                $arrayDados = array(
                    "id" => 'id'
                );

                $resposta = excluirLivros($arrayDados);


                if (is_bool($resposta)) {
                    if ($resposta)
                        echo ("<script>
                        alert('Registro excluído com sucesso');
                        window.location.href = 'index.php';
                            </script>");
                } elseif (is_array($resposta))
                    echo ("<script>
                        alert('" . $resposta['message'] . "');
                        window.history.back();
                         </script>");
            }
    
                elseif ($action == 'BUSCAR') {
                    $id = $_GET['id'];
                    
                  
                    $dados= buscarID($id);

                    session_start();
                    $_SESSION['dadosLivros'] = $dados;

                   
                    require_once('index.php');
                }
            
                elseif ($action == 'EDITAR') {
                    $id = $_GET['id'];
            
                    $arraydados = array(
                        "id" => $id,
                        $_POST
                    );
                    $resposta = atualizarLivros($arrayDados, $id);   

          
                    if (is_bool($resposta)) {
                        if ($resposta)
                            echo ("<script> 
                                    alert('Registro atualizado com sucesso!');
                                    window.location.href = 'index.php'; 
                                </script>");
                    } elseif (is_array($resposta)) {

                        echo ("<script> 
                                    alert('" . $resposta['message'] . "');
                                    window.history.back(); 
                            </script>");
                    }
         }
    }   
}
