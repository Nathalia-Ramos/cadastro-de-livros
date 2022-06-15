<?php
const SERVER = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'biblioteca';


function conexaoMySql()
{
    $conexao = array();

    //Se a conexao for estabelecida com o Banco de dados, vamos ter um array de dados sobre a conexao
    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    //Validação a conexao com o banco de dados
    if ($conexao)
        return $conexao;
    else
        return false;
}

function fecharConexaoMySql($conexao)
{
    mysqli_close($conexao);
}

