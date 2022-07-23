<?php

$form = (string) "router.php?component=livros&action=inserir";   


if (session_status()) {
    

    //Valida se a variavel de sessão dadosLivros não está vazia
    if (!empty($_SESSION['dadosLivros'])) {

       
        $id            =  $_SESSION['dadosLivros']['id'];
        $nome          =  $_SESSION['dadosLivros']['nome'];
        $editora       =  $_SESSION['dadosLivros']['editora'];
        $idioma        =  $_SESSION['dadosLivros']['idioma'];
        $autor         =  $_SESSION['dadosLivros']['Autor'];
        $qtsPaginar    =  $_SESSION['dadosLivros']['qtsPaginar'];
        $resumo        =  $_SESSION['dadosLivros']["resumo"];
        
        $form = "router.php?component=livros&action=editar&id=".$id;
        

        //destrói variavel
        unset($_SESSION['$dadosLivros']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Gerenciamento de Biblioteca/css/style.css">
    <title>Biblioteca</title>
</head>

<body>
    <div id="cadastro">
        <div id="cadastroTitulo">
            <h1> Cadastro de Livros </h1>
        </div>
        <div id="cadastroInformacoes">
            <form action="router.php?component=livros&action=inserir" name="frmCadastro" method="post">

                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Nome: </label>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?= isset($nome) ? $nome : null ?>">
                        </div>
                    </div>
                </div>

                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Editora: </label>
                        <input type="text" name="txtEditora" value="<?= isset($editora) ? $editora : null ?>">
                    </div>
                </div>


                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Idioma: </label>

                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtIdioma" value="<?= isset($idioma) ? $idioma : null ?>">
                        </div>
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Autor: </label>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtAutor" value="<?= isset($autor) ? $autor : null ?>">
                        </div>
                    </div>
                </div>


                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Qts páginas: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtQtspaginas" value="<?= isset($qtsPaginar) ? $qtsPaginar : null ?>">
                    </div>
                </div>


                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Resumo sobre o livro: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text"name="txtResumo" cols="50" rows="7" value="<?= isset($resumo) ? $resumo : null ?>"></input>
                    </div>
                </div>

                <div class="enviar">
                    <div class="enviar">
                        <input type="submit" name="btnEnviar" value="Salvar">
                    </div>
                </div>
        </div>
        </form>
    </div>


    <div id="consultaDeDados">
        <table id="tblConsulta">
            <tr>
                <td id="tblTitulo" colspan="6">
                    <h1> Consulta dos Livros</h1>
                </td>
            </tr>
            <tr id="tblLinhas">
                <td class="tblColunas destaque"> Nome </td>
                <td class="tblColunas destaque"> Editora </td>
                <td class="tblColunas destaque"> Idioma </td>
                <td class="tblColunas destaque"> Autor</td>
                <td class="tblColunas destaque"> Quantas Páginas </td>
                <td class="tblColunas destaque"> Resumo do Livro</td>
                <td class="tblColunas destaque"> Opções </td>
            </tr>





            <?php

            require_once('./controller/controllerLivraria.php');

            if ($listLivros = listarLivraria()) {



                foreach ($listLivros as $item) {

            ?>

                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?= $item['nome'] ?></td>
                        <td class="tblColunas registros"><?= $item['editora'] ?></td>
                        <td class="tblColunas registros"><?= $item['idioma'] ?></td>
                        <td class="tblColunas registros"><?= $item['Autor'] ?></td>
                        <td class="tblColunas registros"><?= $item['qtsPaginar'] ?></td>
                        <td class="tblColunas registros"><?= $item['resumo'] ?></td>




                        <td class="tblColunas registros">
                            <a href="router.php?component=livros&action=buscar&id=<?= $item['id'] ?>">
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <a onclick="return confirm('Deseja excluir esse item?')" href="router.php?component=livros&action=deletar&id=<?= $item['id'] ?>">
                                <img src="./img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>

                        </td>
                    </tr>


            <?php



                }
            }
            ?>

        </table>
    </div>

</body>

</html>