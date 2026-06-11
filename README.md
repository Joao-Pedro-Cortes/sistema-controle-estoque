<h1>Sistema de Controle de Estoque</h1>

<p>
A ideia principal é criar um sistema de controle de estoque, começando pela parte de login, usuários e níveis de acesso. Ainda é uma primeira versão, mas pretendo continuar evoluindo o projeto conforme avanço
</p>

<hr>

<h2>Tecnologias utilizadas</h2>

<ul>
    <li>PHP</li>
    <li>MySQL / MariaDB</li>
    <li>HTML</li>
    <li>XAMPP</li>
    <li>phpMyAdmin</li>
</ul>

<hr>

<h2>O que o sistema já faz</h2>

<ul>
    <li>Conecta com o banco de dados</li>
    <li>Possui tela de login</li>
    <li>Trabalha com sessões</li>
    <li>Controla níveis de acesso</li>
    <li>Permite cadastrar usuários</li>
    <li>Criptografa as senhas antes de salvar no banco</li>
    <li>Possui opção de sair do sistema</li>
</ul>

<hr>

<h2>Banco de dados</h2>

<p>
O banco utilizado no projeto se chama estoque_db
</p>

<p>
Até o momento, ele conta com duas tabelas principais:
</p>

<h3>login_lvls</h3>

<p>
Essa tabela guarda os níveis de acesso dos usuários. Nela ficam cadastrados os tipos de permissão, como administrador, operador e usuário comum
</p>

<h3>usuarios</h3>

<p>
Essa tabela guarda os usuários cadastrados no sistema. Ela armazena o nome de usuário, a senha criptografada e o nível de acesso de cada conta
</p>

<p>
As duas tabelas se relacionam pelo campo id_lvl. Dessa forma, cada usuário fica ligado a um nível específico dentro do sistema
</p>

<hr>

<h2>Organização dos arquivos</h2>

<p>
A estrutura do projeto foi organizada de forma simples, separando os arquivos principais do sistema:
</p>

<ul>
    <li>Logar.php - tela de login do sistema</li>
    <li>Entrada.php - página inicial após o login</li>
    <li>ControleEntrada.php - protege as páginas contra acesso sem login</li>
    <li>Adicionarusuario.php - adiciona novos usuários no banco</li>
    <li>gerenciamentousuario.php - página para visualizar e gerenciar usuários</li>
    <li>Cifrar.php - responsável pela criptografia das senhas</li>
    <li>linkagemdb.php - arquivo de conexão com o banco de dados</li>
    <li>Deslogar.php - encerra a sessão do usuário</li>
</ul>

<hr>

<h2>Como executar o projeto</h2>

<ol>
    <li>Instale o XAMPP</li>
    <li>Inicie o Apache e o MySQL</li>
    <li>Crie ou importe o banco de dados estoque_db</li>
    <li>Coloque os arquivos do projeto dentro da pasta htdocs</li>
    <li>Acesse o projeto pelo navegador usando o localhost</li>
</ol>

<hr>

<h2>Próximas melhorias</h2>

<ul>
    <li>Adicionar CSS para melhorar a aparência do sistema</li>
    <li>Organizar melhor as telas</li>
    <li>Criar o cadastro de produtos</li>
    <li>Adicionar consulta de produtos no estoque</li>
    <li>Registrar produtos que saíram do estoque, com data, horário e quantidade</li>
    <li>Implementar edição e exclusão de registros</li>
    <li>Melhorar as validações dos formulários</li>
    <li>Deixar o sistema mais completo e mais próximo de uma aplicação real</li>
</ul>


<h2>Autor</h2>

<p>
João Pedro Cortes da Silva Sedenho
</p>
