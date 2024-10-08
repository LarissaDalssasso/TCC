<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Inscrição</title>
    <link rel="stylesheet" href="edital.css">
    <meta charset="UTF-8">

</head>

<body>
    <form id="form" action="salvar.php" method="post">
        <h2>Identificação do Pessoa</h2>
        <div>
            <input type="radio" id="pessoa-juridica-sem-lucro" name="identificacao"
                value="Pessoa Jurídica sem finalidade lucrativa">
            <label for="pessoa-juridica-sem-lucro">Pessoa Jurídica sem finalidade lucrativa</label>
        </div>
        <div>
            <input type="radio" id="pessoa-juridica-com-lucro" name="identificacao"
                value="Pessoa Jurídica com finalidade lucrativa">
            <label for="pessoa-juridica-com-lucro">Pessoa Jurídica com finalidade lucrativa</label>
        </div>
        <div>
            <label for="representante-social">Representante Social:</label>
            <input type="text" id="representante-social" name="representante-social">
        </div>
        <div>
            <label for="nome-fantasia">Nome Fantasia:</label>
            <input type="text" id="nome-fantasia" name="nome-fantasia">
        </div>
        <div>
            <label for="cnpj">CNPJ:</label>
            <input type="number" id="cnpj" name="cnpj">
        </div>
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco">
            <div>
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua">
            </div>
            <div>
                <label for="numero">Número:</label>
                <input type="number" id="numero" name="numero">
            </div>
            <div>
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade">
            </div>
            <div>
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado">
            </div>
            <div>
                <label for="cep">CEP:</label>
                <input type="number" id="cep" name="cep">
            </div>
        </div>
        <div>
            <label for="representante-legal">Representante Legal:</label>
            <input type="text" id="representante-legal" name="representante-legal">
        </div>
        <div>
            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo">
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="number" id="cpf" name="cpf">
        </div>
        <div>
            <label for="rg">RG:</label>
            <input type="number" id="rg" name="rg">
        </div>
        <div>
            <label for="endereco-representante">Endereço do Representante:</label>
            <input type="text" id="endereco-representante" name="endereco-representante">
            <div>
                <label for="rua-representante">Rua:</label>
                <input type="text" id="rua-representante" name="rua-representante">
            </div>
            <div>
                <label for="numero-representante">Número:</label>
                <input type="number" id="numero-representante" name="numero-representante">
            </div>
            <div>
                <label for="cidade-representante">Cidade:</label>
                <input type="text" id="cidade-representante" name="cidade-representante">
            </div>
            <div>
                <label for="estado-representante">Estado:</label>
                <input type="text" id="estado-representante" name="estado-representante">
            </div>
            <div>
                <label for="cep-representante">CEP:</label>
                <input type="number" id="cep-representante" name="cep-representante">
            </div>
        </div>
        <div>
            <label for="telefone"> Telefone/Whatsapp:</label>
            <input type="tel" id="telefone" name="telefone">
        </div>
        <div>
            <label for="genero">Gênero do Representante Legal:</label>
            <div>
                <input type="radio" id="mulher-cisgenero" name="genero" value="Mulher cisgênero">
                <label for="mulher-cisgenero">Mulher cisgênero</label>
            </div>
            <div>
                <input type="radio" id="homem-cisgenero" name="genero" value="Homem cisgênero">
                <label for="homem-cisgenero">Homem cisgênero</label>
            </div>
            <div>
                <input type="radio" id="mulher-transgenero" name="genero" value="Mulher Transgênero">
                <label for="mulher-transgenero">Mulher Transgênero</label>
            </div>
            <div>
                <input type="radio" id="homem-transgenero" name="genero" value="Homem Transgênero">
                <label for="homem-transgenero">Homem Transgênero</label>
            </div>
            <div>
                <input type="radio" id="nao-binaria" name="genero" value="Não BináriaBinárie">
                <label for="nao-binaria">Não BináriaBinárie</label>
            </div>
            <div>
                <input type="radio" id="nao-informar" name="genero" value="Não informar">
                <label for="nao-informar">Não informar</label>
            </div>
        </div>
        <div>
            <label for="raca">Raça/cor/etnia do Representante Legal:</label>
            <div>
                <input type="radio" id="branca" name="raca" value="Branca">
                <label for="branca">Branca</label>
            </div>
            <div>
                <input type="radio" id="preta" name="raca" value="Preta">
                <label for="preta">Preta</label>
            </div>
            <div>
                <input type="radio" id="parda" name="raca" value="Parda">
                <label for="parda">Parda</label>
            </div>
            <div>
                <input type="radio" id="amarela" name="raca" value="Amarela">
                <label for="amarela">Amarela</label>
            </div>
            <div>
                <input type="radio" id="indigena" name="raca" value="Indígena">
                <label for="indigena">Indígena</label>
            </div>
        </div>
        <div>
            <label for="deficiencia">Representante legal é pessoa com deficiência - PCD?</label>
            <div>
                <input type="radio" id="sim" name="deficiencia" value="Sim">
                <label for="sim">Sim</label>
            </div>
            <div>
                <input type="radio" id="nao" name="deficiencia" value="Não">
                <label for="nao">Não</label>
            </div>
        </div>
        <div>
            <label for="tipo-deficiencia">Caso tenha marcado "sim" qual o tipo de deficiência?</label>
            <div>
                <input type="radio" id="auditiva" name="tipo-deficiencia" value="Auditiva">
                <label for="auditiva">Auditiva</label>
            </div>
            <div>
                <input type="radio" id="fisica" name="tipo-deficiencia" value="Física">
                <label for="fisica">Física</label>
            </div>
            <div>
                <input type="radio" id="intelectual" name="tipo-deficiencia" value="Intelectual">
                <label for="intelectual">Intelectual</label>
            </div>
            <div>
                <input type="radio" id="multipla" name="tipo-deficiencia" value="Múltipla">
                <label for="multipla">Múltipla</label>
            </div>
            <div>
                <input type="radio" id="visual" name="tipo-deficiencia" value="Visual">
                <label for="visual">Visual</label>
            </div>
        </div>
        <div>
            <label for="escolaridade">Escolaridade do Representante Legal:</label>
            <div>
                <input type="radio" id="nao-tenho-educacao-formal" name="escolaridade"
                    value="Não tenho Educação Formal">
                <label for="nao-tenho-educacao-formal">Não tenho Educação Formal</label>
            </div>
            <div>
                <input type="radio" id="ensino-medio-incompleto" name="escolaridade" value="Ensino Médio Incompleto">
                <label for="ensino-medio-incompleto">Ensino Médio Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-fundamental-incompleto" name="escolaridade"
                    value="Ensino Fundamental Incompleto">
                <label for="ensino-fundamental-incompleto">Ensino Fundamental Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-medio-completo" name="escolaridade" value="Ensino Médio Completo">
                <label for="ensino-medio-completo">Ensino Médio Completo</label>
            </div>
            <div>
                <input type="radio" id="ensino-fundamental-completo" name="escolaridade"
                    value="Ensino Fundamental Completo">
                <label for="ensino-fundamental-completo">Ensino Fundamental Completo</label>
            </div>
            <div>
                <input type="radio" id="curso-tecnico-incompleto" name="escolaridade" value="Curso Técnico Incompleto">
                <label for="curso-tecnico-incompleto">Curso Técnico Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-superior-incompleto" name="escolaridade"
                    value="Ensino Superior Incompleto">
                <label for="ensino-superior-incompleto">Ensino Superior Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-superior-completo" name="escolaridade" value="Ensino Superior Completo">
                <label for="ensino-superior-completo">Ensino Superior Completo</label>
            </div>
            <div>
                <input type="radio" id="pos-graduacao-completo" name="escolaridade" value="Pós Graduação Completo">
                <label for="pos-graduacao-completo">Pós Graduação Completo</label>
            </div>
        </div>
        <div>
            <label for="curriculo">Currículo da Pessoa Jurídica:</label>
            <input type="file" id="curriculo" name="curriculo">
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-primary">Menu</a>
            <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
            <a href="editalParte2.html" class="btn btn-primary">Parte Dois</a>
        </div>

    </form>
</body>

</html>