<?php session_start(); ?> 
<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Inscrição</title>
    <link rel="stylesheet" href="style.css">
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
        <!-- Planejamento e Organização -->
        <div>
            <label for="nome-projeto">Nome do Projeto:</label>
            <input type="text" id="nome-projeto" name="nome-projeto">
        </div>
        <div>
            <label for="categoria">Escolha a categoria a que vai concorrer:</label>
            <div>
                <input type="radio" id="categoria-1" name="categoria"
                    value="1.1. Apoio exclusivo à produção audiovisual (R$ 93.700,19)">
                <label for="categoria-1">1.1. Apoio exclusivo à produção audiovisual (R$ 93.700,19)</label>
            </div>
            <div>
                <input type="radio" id="categoria-2" name="categoria"
                    value="1.2. Apoio à reforma de sala de cinema, implantação de cinema de rua ou cinema itinerante (R$22.544,94)">
                <label for="categoria-2">1.2. Apoio à reforma de sala de cinema, implantação de cinema de rua ou cinema
                    itinerante (R$22.544,94)</label>
            </div>
            <div>
                <input type="radio" id="categoria-3" name="categoria"
                    value="1.3. Projeto que vise o desenvolvimento da cidade como locação (R$ 11.319,01)">
                <label for="categoria-3">1.3. Projeto que vise o desenvolvimento da cidade como locação (R$
                    11.319,01)</label>
            </div>
            <div>
                <input type="radio" id="categoria-4" name="categoria" value="1.4. Artes Visuais (R$ 17.890,74)">
                <label for="categoria-4">1.4. Artes Visuais (R$ 17.890,74)</label>
            </div>
            <div>
                <input type="radio" id="categoria-5" name="categoria" value="1.5. Música (R$ 17.890,74)">
                <label for="categoria-5">1.5. Música (R$ 17.890,74)</label>
            </div>
            <div>
                <input type="radio" id="categoria-6" name="categoria" value="1.6. Artes Cênicas (R$ 17.890,74)">
                <label for="categoria-6">1.6. Artes Cênicas (R$ 17.890,74)</label>
            </div>
        </div>
        <div>
            <label for="descricao-projeto">Descrição do Projeto para o Site:</label>
            <textarea id="descricao-projeto" name="descricao-projeto"></textarea>
        </div>
        <div>
            <label for="objetivo">Objetivo:</label>
            <textarea id="objetivo" name="objetivo"></textarea>
        </div>
        <div>
            <label for="meta">Meta:</label>
            <textarea id="meta" name="meta"></textarea>
        </div>
        <div>
            <label for="publico">Público:</label>
            <textarea id="publico" name="publico"></textarea>
        </div>
        <div>
            <label for="acao-cultural">Sua ação cultural é voltada prioritariamente para algum destes perfis de
                público?</label>
            <div>
                <input type="checkbox" id="pessoas-vitimas-violencia" name="acao-cultural"
                    value="Pessoas vítimas de violência">
                <label for="pessoas-vitimas-violencia">Pessoas vítimas de violência</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-pobreza" name="acao-cultural" value="Pessoas em situação de pobreza">
                <label for="pessoas-pobreza">Pessoas em situação de pobreza</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-rua" name="acao-cultural"
                    value="Pessoas em situação de rua (moradores de rua)">
                <label for="pessoas-rua">Pessoas em situação de rua (moradores de rua)</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-restricao-liberdade" name="acao-cultural"
                    value="Pessoas em situação de restrição e privação de liberdade (população carcerária)">
                <label for="pessoas-restricao-liberdade">Pessoas em situação de restrição e privação de liberdade
                    (população carcerária)</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-deficiencia" name="acao-cultural" value="Pessoas com deficiência">
                <label for="pessoas-deficiencia">Pessoas com deficiência</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-sofrimento" name="acao-cultural"
                    value="Pessoas em sofrimento físico e/ou psíquico">
                <label for="pessoas-sofrimento">Pessoas em sofrimento físico e/ou psíquico</label>
            </div>
            <div>
                <input type="checkbox" id="mulheres" name="acao-cultural" value="Mulheres">
                <label for="mulheres">Mulheres</label>
            </div>
            <div>
                <input type="checkbox" id="comunidade-lgbtqiap" name="acao-cultural" value="Comunidade LGBTQIAP+">
                <label for="com unidade-lgbtqiap">Comunidade LGBTQIAP+</label>
            </div>
            <div>
                <input type="checkbox" id="povos-comunidades-tradicionais" name="acao-cultural"
                    value="Povos e comunidades tradicionais">
                <label for="povos-comunidades-tradicionais">Povos e comunidades tradicionais</label>
            </div>
            <div>
                <input type="checkbox" id="negros-negras" name="acao-cultural" value="Negros e/ou negras">
                <label for="negros-negras">Negros e/ou negras</label>
            </div>
            <div>
                <input type="checkbox" id="ciganos" name="acao-cultural" value="Ciganos">
                <label for="ciganos">Ciganos</label>
            </div>
            <div>
                <input type="checkbox" id="indigenas" name="acao-cultural" value="Indígenas">
                <label for="indigenas">Indígenas</label>
            </div>
            <div>
                <input type="checkbox" id="aberta-todas" name="acao-cultural" value="Aberta para todas">
                <label for="aberta-todas">Aberta para todas</label>
            </div>
            <div>
                <input type="checkbox" id="outros" name="acao-cultural" value="Outros">
                <label for="outros">Outros</label>
            </div>
        </div>
        <div>
            <label for="medidas-acessibilidade">Medidas de acessibilidade empregadas no projeto:</label>
            <textarea id="medidas-acessibilidade" name="medidas-acessibilidade"></textarea>
        </div>
        <div>
            <label for="acessibilidade-comunicacional">Acessibilidade comunicacional:</label>
            <div>
                <input type="checkbox" id="libras" name="acessibilidade-comunicacional"
                    value="A Língua Brasileira de Sinais - Libras">
                <label for="libras">A Língua Brasileira de Sinais - Libras</label>
            </div>
            <div>
                <input type="checkbox" id="braille" name="acessibilidade-comunicacional" value="O Sistema Braille">
                <label for="braille">O Sistema Braille</label>
            </div>
            <div>
                <input type="checkbox" id="sinalizacao-tatil" name="acessibilidade-comunicacional"
                    value="O Sistema de sinalização ou comunicação tátil">
                <label for="sinalizacao-tatil">O Sistema de sinalização ou comunicação tátil</label>
            </div>
            <div>
                <input type="checkbox" id="audiodescricao" name="acessibilidade-comunicacional"
                    value="A Audiodescrição">
                <label for="audiodescricao">A Audiodescrição</label>
            </div>
            <div>
                <input type="checkbox" id="legendas" name="acessibilidade-comunicacional" value="As Legendas">
                <label for="legendas">As Legendas</label>
            </div>
            <div>
                <input type="checkbox" id="traducao-simultanea" name="acessibilidade-comunicacional"
                    value="A Tradução simultânea">
                <label for="traducao-simultanea">A Tradução simultânea</label>
            </div>
            <div>
                <input type="checkbox" id="traducao-simultanea-libras" name="acessibilidade-comunicacional"
                    value="A Tradução simultânea em Libras">
                <label for="traducao-simultanea-libras">A Tradução simultânea em Libras</label>
            </div>
            <div>

                <div>
                    <label for="medidas-acessibilidade">Medidas de acessibilidade empregadas no projeto:</label>
                    <textarea id="medidas-acessibilidade" name="medidas-acessibilidade"></textarea>
                </div>
                <div>
                    <label for="implementacao-acessibilidade">Informe como essas medidas de acessibilidade serão
                        implementadas ou disponibilizadas de acordo com o projeto proposto:</label>
                    <textarea id="implementacao-acessibilidade" name="implementacao-acessibilidade"></textarea>
                </div>
                <div>
                    <label for="local-execucao">Local onde o projeto será executado:</label>
                    <textarea id="local-execucao" name="local-execucao"></textarea>
                </div>
                <div>
                    <label for="data-inicio">Data de Início:</label>
                    <input type="date" id="data-inicio" name="data-inicio">
                </div>
                <div>
                    <label for="data-final">Data Final:</label>
                    <input type="date" id="data-final" name="data-final">
                </div>
                <div>
                    <label for="estrategia-divulgacao">Estratégia de divulgação:</label>
                    <textarea id="estrategia-divulgacao" name="estrategia-divulgacao"></textarea>
                </div>
                <div>
                    <label for="contrapartida">Contrapartida:</label>
                    <textarea id="contrapartida" name="contrapartida"></textarea>
                </div>
                <div>
                    <label for="recursos-financeiros">Projeto possui recursos financeiros de outras fontes? Se sim,
                        quais?</label>
                    <div>
                        <input type="radio" id="nao-possui-recursos" name="recursos-financeiros"
                            value="Não, o projeto não possui outras fontes de recursos financeiros">
                        <label for="nao-possui-recursos">Não, o projeto não possui outras fontes de recursos
                            financeiros</label>
                    </div>
                    <div>
                        <input type="radio" id="apoio-municipal" name="recursos-financeiros"
                            value="Apoio financeiro municipal">
                        <label for="apoio-municipal">Apoio financeiro municipal</label>
                    </div>
                    <div>
                        <input type="radio" id="apoio-estadual" name="recursos-financeiros"
                            value="Apoio financeiro estadual">
                        <label for="apoio-estadual">Apoio financeiro estadual</label>
                    </div>
                    <div>
                        <input type="radio" id="recursos-lei-incentivo-municipal" name="recursos-financeiros"
                            value="Recursos de Lei de Incentivo Municipal">
                        <label for="recursos-lei-incentivo-municipal">Recursos de Lei de Incentivo Municipal</label>
                    </div>
                    <div>
                        <input type="radio" id="recursos-lei-incentivo-estadual" name="recursos-financeiros"
                            value="Recursos de Lei de Incentivo Estadual">
                        <label for="recursos-lei-incentivo-estadual">Recursos de Lei de Incentivo Estadual</label>
                    </div>
                    <div>
                        <input type="radio" id="recursos-lei-incentivo-federal" name="recursos-financeiros"
                            value="Recursos de Lei de Incentivo Federal">
                        <label for="recursos-lei-incentivo-federal">Recursos de Lei de Incentivo Federal</label>
                    </div>
                    <div>
                        <input type="radio" id="patrocinio-privado" name="recursos-financeiros"
                            value="Patrocínio privado direto">
                        <label for="patrocinio-privado">Patrocínio privado direto</label>
                    </div>
                    <div>
                        <input type="radio" id="patrocinio-instituicao-internacional" name="recursos-financeiros"
                            value="Patrocínio de instituição internacional">
                        <label for="patrocinio-instituicao-internacional">Patrocínio de instituição
                            internacional</label>
                    </div>
                    <div>
                        <input type="radio" id="doacoes-pessoas-fisicas" name="recursos-financeiros"
                            value="Doações de Pessoas Físicas">
                        <label for="doacoes-pessoas-fisicas">Doações de Pessoas Físicas</label>
                    </div>
                    <div>
                        <input type="radio" id="doacoes-empresas" name="recursos-financeiros"
                            value="Doações de Empresas">
                        <label for="doacoes-empresas">Doações de Empresas</label>
                    </div>
                    <div>
                        <input type="radio" id="cobranca-ingressos" name="recursos-financeiros"
                            value="Cobrança de ingressos">
                        <label for="cobranca-ingressos">Cobrança de ingressos</label>
                    </div>
                    <div>
                        <input type="radio" id="outros" name="recursos-financeiros" value="Outros">
                        <label for="outros">Outros</label>
                    </div>
                </div>
                <div>
                    <label for="detalhe-recursos">Se o projeto tem outras fontes de financiamento, detalhe quais são, o
                        valor do financiamento e onde os recursos serão empregados no projeto:</label>
                    <textarea id="detalhe-recursos" name="detalhe-recursos"></textarea>
                </div>
                <div>
                    <label for="venda-produtos-ingressos">O projeto prevê a venda de produtos/ingressos?</label>
                    <textarea id="venda-produtos-ingressos" name="venda-produtos-ingressos"></textarea>
                </div>
                <div>
                    <label for="parametros-orcamentarios">Indicar que parâmetros foram utilizados para identificação dos
                        valores na planilha orçamentária:</label>
                    <textarea id="parametros-orcamentarios" name="parametros-orcamentarios"></textarea>
                </div>
                <!-- Anexos -->
                <div>
                    <label for="anexos">Anexos:</label>
                    <input type="file" id="anexos" name="anexos" multiple>
                </div>
                <div>
                    <label for="estatuto-social">Estatuto Social, com sede no Município e finalidade cultural,
                        devidamente registrado:</label>
                    <input type="file" id="estatuto-social" name="estatuto-social">
                </div>
                <div>
                    <label for="ata-eleicao-pose">Ata de eleição e posse devidamente registrada:</label>
                    <input type="file" id="ata-eleicao-pose" name="ata-eleicao-pose">
                </div>
                <div>
                    <label for="cnpj">Cópia do Cadastro Nacional de Pessoa Jurídica:</label>
                    <input type="file" id="cnpj" name="cnpj">
                </div>
                <div>
                    <label for="documento-pessoal-dirigente">Cópia de documento pessoal que contenha o CPF e RG do
                        dirigente da OSC:</label>
                    <input type="file" id="documento-pessoal-dirigente" name="documento-pessoal-dirigente">
                </div>
                <div>
                    <label for="comprovante-residencia-dirigente">Cópia de comprovante de residência do dirigente da
                        OSC:</label>
                    <input type="file" id="comprovante-residencia-dirigente" name="comprovante-residencia-dirigente">
                </div>
                <div>
                    <label for="declaracoes-gerais">Declarações gerais (Anexo II):</label>
                    <input type="file" id="declaracoes-gerais" name="declaracoes-gerais">
                </div>
                <div>
                    <label for="certificado-condicao-microempreendedor">Certificado de Condição de Microempreendedor
                        Individual – CCMEI ou Contrato Social, com sede no Município de Ibirama anterior ao mês de julho
                        de 2022:</label>
                    <input type="file" id="certificado-condicao-microempreendedor"
                        name="certificado-condicao-microempreendedor">
                </div>
                <div>
                    <label for="cnpj-ativo"> Cópia de Cadastro Nacional de Pessoa Jurídica ativo com Classificação
                        Nacional de Atividades Econômicas (CNAE) vinculado ao setor cultural:</label>
                    <input type="file" id="cnpj-ativo" name="cnpj-ativo">
                </div>
                <div>
                    <label for="documento-pessoal-socio">Cópia de documento pessoal que contenha CPF e RG do sócio
                        proprietário:</label>
                    <input type="file" id="documento-pessoal-socio" name="documento-pessoal-socio">
                </div>
                <div>
                    <label for="comprovante-residencia-socio">Cópia do comprovante de residência do sócio
                        proprietário:</label>
                    <input type="file" id="comprovante-residencia-socio" name="comprovante-residencia-socio">
                </div>
                <div>
                    <label for="declaracoes-gerais-socio">Declarações Gerais (Anexo II):</label>
                    <input type="file" id="declaracoes-gerais-socio" name="declaracoes-gerais-socio">
                </div>
                <button type="submit" id="salvar" name="salvar">Salvar</button>

    </form>
</body>

</html>