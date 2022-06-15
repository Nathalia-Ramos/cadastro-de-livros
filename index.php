<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>

<body>
    <div id="cadastro">
        <div id="cadastroTitulo">
            <h1> Cadastro de Contatos </h1>
        </div>
        <div id="cadastroInformacoes">
            <form action="<?= $form ?>" name="frmCadastro" method="post" enctype="multipart/form-data">
                <!-- "multipart/form-data" - essa opção é obrigatória para enviar arquivos para o servidor-->
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Nome: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="nome" value="" </div>
                    </div>

                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Editora: </label>
                        </div>
                    </div>

                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Idioma: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="telefone" value="" </div>
                        </div>
                        <div class="campos">
                            <div class="cadastroInformacoesPessoais">
                                <label> Autor: </label>
                            </div>
                            <div class="cadastroEntradaDeDados">
                                <input type="tel" name="celular" value="" 
                            </div>
                        </div>


                            <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label> Qts páginas: </label>
                                </div>
                                <div class="cadastroEntradaDeDados">
                                    <input type="text" name="qts paginas" value=""
                                 </div>
                              </div>
            

                                <div class="campos">
                                    <div class="cadastroInformacoesPessoais">
                                        <label> Resumo sobre o livro: </label>
                                    </div>
                                    <div class="cadastroEntradaDeDados">
                                        <textarea name="obs" cols="50" rows="7"></textarea>
                                    </div>
                                </div>

                                <div class="enviar">
                                    <div class="enviar">
                                        <input type="submit" name="btnEnviar" value="Salvar">
                                    </div>
                                </div>
            </form>
        </div>
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
                    <td class="tblColunas destaque"> Qts páginas </td>
                    <td class="tblColunas destaque"> Resumo do Livro</td>
                </tr>

                <tr id="tblLinhas">
                    <td class="tblColunas registros">
                        
                    </td>
                    <td class="tblColunas registros">
                      
                    </td>
                    <td class="tblColunas registros">
                      
                    </td>
                   
                    <td class="tblColunas registros">
                        <a href="router.php?component=contatos&action=buscar&id=<?= $item['id'] ?>">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>
                        <a onclick="return confirm('Deseja excluir esse item?')"
                            href="router.php?component=contatos&action=deletar&id=<?= $item['id'] ?>&foto=<?= $foto ?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                        <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                    </td>
                </tr>
    

            </table>
        </div>

        <?php
            // Import do arquivo da controller para asolicitar a listagem dos dados
            require_once('./controller/controllerLivraria.php');
            // Chama a função que retorna os dados de contatos
            if ($listLivros = listarLivraria()) {
           
                // Estrutura de repetição para retornar os dados do array e printar na tela
                foreach ($listLivros as $item) {

            ?>
            
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?= $item['nome'] ?></td>
                        <td class="tblColunas registros"><?= $item['editora'] ?></td>
                        <td class="tblColunas registros"><?= $item['idioma'] ?></td>
                        <td class="tblColunas registros"><?= $item['Autor'] ?></td>
                        <td class="tblColunas registros"><?= $item['qtsPaginar'] ?></td>
                        <td class="tblColunas registros"><?= $item['resumo'] ?></td>

                    </tr>
            <?php
            // var_dump($listLivros);
            // die;
                }
            }
            ?>

    </body>

</html>