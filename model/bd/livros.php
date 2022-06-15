<?php 

     require_once('./model/bd/conexaoMySql.php');

function insertLivros($dadosLivros){

  

    $conexao = conexaoMySql();

    $sql = "insert into tblbiblioteca (nome, 
                editora, 
                idioma, 
                autor, 
                qtsPaginar, 
                resumo)
            values
                ('" . $dadosLivros['nome'] . "',
                '" . $dadosLivros['editora'] . "',
                '" . $dadosLivros['idioma'] . "',
                '" . $dadosLivros['autor'] . "',
                '" . $dadosLivros['qtsPaginar'] . "',
                 '".$dadosLivros['resumo']."');";

    //valida para ver se o script está correto
    if(mysqli_query($conexao, $sql)){

        if (mysqli_affected_rows($conexao))
        $statusResposta = true; 
    }else
        fecharConexaoMySql($conexao);

     return $statusResposta;

}

function selectAllLivros(){

    $conexao = conexaoMySql();

    $sql = 'select * from tblbiblioteca order by id desc';

    $result = mysqli_query($conexao, $sql);

       //valida se o BD retorna registros
       if ($result) {

        $cont = 0;
        //nesta repeticao estamos convertendo os dados do banco de daos do BD em um array ($rsDados),
        // alem de o proprio while conseguir gerenciar a quantidade de vezes que dveria ser feita a repeticao
        while ($rsDados = mysqli_fetch_assoc($result))
         {
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

        if(isset($arrayDados))
            return $arrayDados;
        else    
            return false;    
    }
}
?>