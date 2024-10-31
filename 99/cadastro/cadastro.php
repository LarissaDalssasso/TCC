<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./style.css">

    <title>Cadastro de Funcionarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-icons {
            cursor: pointer;
            padding: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Cadastre-se</h3>
                <form class="requires-validation" novalidate action="salvar_funcionario.php" method="post">
                    <div class="mb-3">
                        <input class="form-control" type="text" name="nome" placeholder="Nome Completo" required>
                        <div class="valid-feedback">Campo do nome é válido</div>
                        <div class="invalid-feedback">Campo do nome não pode estar em branco</div>
                    </div>

                    <div class="mb-3">
                        <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                        <div class="valid-feedback">Email é válido</div>
                        <div class="invalid-feedback">Campo do email não pode estar em branco</div>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="area" required>
                            <option selected disabled value="">Área da Fundação</option>
                            <option value="Esportes">Esportes</option>
                            <option value="Cultura">Cultura</option>
                            <option value="Turismo">Turismo</option>
                            <option value="Educação">Educação</option>
                        </select>
                        <div class="invalid-feedback">Selecione uma opção</div>
                    </div>

                    <div class="mb-3">
                        <input class="form-control" type="password" name="senha" placeholder="Senha" required>
                        <div class="valid-feedback">Senha é válida</div>
                        <div class="invalid-feedback">Senha inválida</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gênero:</label>
                        <div>
                            <input type="radio" class="btn-check" name="genero" id="male" value="Masculino"
                                autocomplete="off" required>
                            <label class="btn btn-outline-secondary" for="male">Masculino</label>

                            <input type="radio" class="btn-check" name="genero" id="female" value="Feminino"
                                autocomplete="off" required>
                            <label class="btn btn-outline-secondary" for="female">Feminino</label>

                            <input type="radio" class="btn-check" name="genero" id="secret" value="Outro"
                                autocomplete="off" required>
                            <label class="btn btn-outline-secondary" for="secret">Outro</label>
                        </div>
                        <div class="invalid-feedback">Selecione um gênero</div>
                    </div>

                    <div class="mb-3 button-group">
                        <button id="submit" type="submit" class="btn btn-primary botao">Registrar</button>
                        <button id="clean" type="reset" class="btn btn-primary botao">Limpar</button>
                    </div>

                    <div class="mt-3 button-group">
                        <a href="administrar_funcionarios.php" class="btn btn-primary botao" id="adm">Administrar
                            Funcionários</a> 
                            
                            <a href="../index.php" class="btn btn-primary botao" id="adm">Voltar</a>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="./script.js"></script>
</body>

</html>