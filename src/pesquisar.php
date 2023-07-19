<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?id=<?php echo time(); ?>" type="text/css">
    <title>Pesquisar</title>
</head>

<body>
    <div class="fundo">
        <h1>Busca</h1>
        <a href="cadastro.php" style="left: 5px;">Voltar</a>
        <a href="sair.php" class="sair" style="float: right; background-color: red;">Sair</a>
        <?php include 'menu.php'; ?>
        <table id="tableClient" class="tb">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Site</th>
                    <th>Contato</th>
                    <th>Fone</th>
                    <th>Cidade</th>
                    <th>Data Contato</th>
                    <th>E-mail</th>
                    <th>Cliente</th>
                    <th>Anotações</th>
                    <th style="width: 173px;">Ação</th>
                </tr>
                <tr>
                    <th><div id="cads"></div></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        
        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Editar</h2>
                </div>
                <div class="modal-body">
                    <form id="form" class="modal-form">
                        <input type="text" id="empresa" data-index="new" class="textinput" placeholder="Nome da empresa" required>
                        <input type="text" id="site" class="textinput" placeholder="Site" required>
                        <input type="text" id="contato" class="textinput" placeholder="Contato" required>
                        <input type="text" id="fone" class="textinput" placeholder="Telefone" required>
                        <input type="text" id="cidade" class="textinput" placeholder="Cidade" required>
                        <input type="text" id="datacontato" class="textinput" placeholder="Data do Contato" required>
                        <input type="email" id="email" class="textinput" placeholder="e-mail do Cliente" required>
                        <select name="Cliente" id="status">
                            <option value="HTC">HTC</option>
                            <option value="Ilson">Ilson</option>
                            <option value="Suzana">Suzana</option>
                        </select>
                        <textarea id="anotacoes" rows="4" cols="50" placeholder="Anotações" required></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="salvar" class="button green" onclick="salvarForm()">Salvar</button>
                    <button id="cancelar" class="button blue" onclick="closeForm()">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
    <script src="js/script2.js?id=<?php echo time(); ?>"></script>
</body>

</html>