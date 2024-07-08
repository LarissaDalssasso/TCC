<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./Style.css">

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
    <!-- partial:index.partial.html -->
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Registre-se</h3>
                        <form class="requires-validation" novalidate action="salvar_funcionario.php" method="post">
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="nome" placeholder="Nome Completo"
                                    required>
                                <div class="valid-feedback">Campo do nome é válido</div>
                                <div class="invalid-feedback">Campo do nome não pode estar em branco</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                                <div class="valid-feedback">Email é válido</div>
                                <div class="invalid-feedback">Campo do email não pode estar em branco</div>
                            </div>

                            <div class="col-md-12">
                                <select class="form-select mt-3" name="area" required>
                                    <option selected disabled value="">Area da Fundação</option>
                                    <option value="Esportes">Esportes</option>
                                    <option value="Cultura">Cultura</option>
                                    <option value="Turismo">Turismo</option>
                                    <option value="Educação">Educação</option>
                                </select>

                                <div class="invalid-feedback">Selecione uma opção</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="senha" placeholder="Senha" required>
                                <div class="valid-feedback">Senha é válida</div>
                                <div class="invalid-feedback">Senha inválida</div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label class="mb-3 mr-1" for="gender">Gênero: </label>

                                <input type="radio" class="btn-check" name="genero" id="male" value="Masculino"
                                    autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="male">Masculino</label>

                                <input type="radio" class="btn-check" name="genero" id="female" value="Feminino"
                                    autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="female">Feminino</label>

                                <input type="radio" class="btn-check" name="genero" id="secret" value="Outro"
                                    autocomplete="off" required>
                                <label class="btn btn-sm btn-outline-secondary" for="secret">Outro</label>
                                <div class="invalid-feedback mv-up">Selecione um gênero</div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Registrar</button>
                                <button id="clean" type="reset" class="btn btn-primary">Limpar</button>
                            </div>

                            <div class="mt-3">
                                <a href="administrar_funcionarios.php" class="btn btn-primary">Administrar
                                    Funcionários</a>
                            </div>

                        </form>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="./script.js"></script>
    

</body>

</html>