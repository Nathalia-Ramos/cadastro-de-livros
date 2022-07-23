 <?php

    require_once 'conexaoMySql.php';


   $statusResposta = (boolean) false;

function insertLivros($dadosLivros)
 {

   
        $statusResposta =  (bool) false;

        $conexao = conexaoMysql();

        $sql = "insert into tblbiblioteca 
                    (nome, 
                     editora, 
                    idioma, 
                    Autor, 
                    qtsPaginar, 
                    resumo)
                values
                ('" . $dadosLivros['nome'] . "',
                '" . $dadosLivros['editora'] . "',
                '" . $dadosLivros['idioma'] . "',
                '" . $dadosLivros['Autor'] . "',
                " . $dadosLivros['qtsPaginar'] . ",
                '" . $dadosLivros['resumo'] . "');";
            
   

            
               
        //Validação para verificar  se o script sql esta correto
        if (mysqli_query($conexao, $sql)) {

            //Validação para verificar se uma linha foi acrescentada no BD
            if (mysqli_affected_rows($conexao))
                $statusResposta = true;
            else
                $statusResposta = false;
        } else {
            $statusResposta = false;
        }

        fecharConexaoMySql($conexao);
        return $statusResposta;
    }

 
function selectAllLivros()
    {


        $conexao = conexaoMySql();

        $sql = 'select * from tblbiblioteca order by id desc';

        $result = mysqli_query($conexao, $sql);

        //valida se o BD retorna registros
        if ($result) {

            $cont = 0;

            while ($rsDados = mysqli_fetch_assoc($result)) {
                //cria um array com os dados do banco de dados 
                $arrayDados[$cont] = array(
                    "id"         =>   $rsDados['id'],
                    "nome"       =>   $rsDados['nome'],
                    "editora"    =>   $rsDados['editora'],
                    "idioma"     =>   $rsDados['idioma'],
                    "Autor"      =>   $rsDados['Autor'],
                    "qtsPaginar" =>   $rsDados['qtsPaginar'],
                    "resumo"     =>   $rsDados['resumo']
                );
                
                $cont++;

            }

   
            fecharConexaoMySql($conexao);

            if (isset($arrayDados))
                return $arrayDados;
            else
                return false;
        }
    
    }


function deleteLivros($id)
{

        $conexao = conexaoMySql();

        $sql = 'delete from tblbiblioteca where id =' . $id;

       

        if(mysqli_query($conexao, $sql)) {

            //Validação para verificar se uma linha foi acrescentada no BD
            if (mysqli_affected_rows($conexao))
                $statusResposta = true;
            
        }
      
            fecharConexaoMysql($conexao);
            return $statusResposta;

 }



function updateLivros($dadosLivros)
{

        $conexao = conexaoMysql();

        $sql = "update tblbiblioteca set
                    nome         = '" . $dadosLivros['nome'] . "',
                    editora      = '" . $dadosLivros['editora'] . "',
                    idioma       = '" . $dadosLivros['idioma'] . "',
                    Autor        = '" . $dadosLivros['Autor'] . "',
                    qtsPaginar   = '" . $dadosLivros['qtsPaginar'] . "',
                    resumo       = '" .$dadosLivros ['resumo'] ."',
                where id         =  " .$dadosLivros['id'];

                
         
      
        if (mysqli_query($conexao, $sql)) {
          
            //Validação para verificar se uma linha foi acrescentada no BD
            if (mysqli_affected_rows($conexao))
                $statusResposta = true;
            else
                $statusResposta = false;
        } else {
            $statusResposta = false;
        }

        fecharConexaoMySql($conexao);
        return $statusResposta;
}


function selectById($id)
{
    $conexao = conexaoMySql();

    $sql = "select * from tblbiblioteca where id = " .$id;

       
    $result = mysqli_query($conexao, $sql);

    if($result){
        if($rsDados = mysqli_fetch_assoc($result)){
            $arrayDados = array(
                "id"         => $rsDados['id'],
                "nome"       => $rsDados['nome'],
                "editora"    => $rsDados['editora'],
                "idioma"     => $rsDados['idioma'],
                "Autor"      => $rsDados['Autor'],
                "qtsPaginar" => $rsDados['qtsPaginar'],
                "resumo"     => $rsDados['resumo']

            );
            
        }
         fecharConexaoMySql($conexao);
         
    }
    
        if(isset($arrayDados))
            return $arrayDados;
        else 
            return false;   
        
}



 ?> 