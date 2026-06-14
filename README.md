<h1>Sistema de Controle de Estoque</h1>

<p>
Este projeto foi desenvolvido com o objetivo de praticar PHP, MySQL e conceitos de desenvolvimento web.
</p>

<p>
A ideia é criar um sistema de controle de estoque de forma gradual, começando pela autenticação de usuários e controle de acesso, e adicionando novas funcionalidades conforme avanço nos estudos e ganho mais experiência com a linguagem.
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

<h2>Funcionalidades atuais</h2>

<ul>
    <li>Conexão com banco de dados</li>
    <li>Sistema de login</li>
    <li>Controle de sessões</li>
    <li>Controle de níveis de acesso</li>
    <li>Cadastro de usuários</li>
    <li>Criptografia de senhas</li>
    <li>Encerramento de sessão (logoff)</li>
    <li>Gerenciamento de usuários</li>
</ul>

<hr>

<h2>Banco de Dados</h2>

<p>
O sistema utiliza um banco de dados chamado estoque_db.
</p>

<p>
Atualmente ele possui duas tabelas principais:
</p>

<h3>login_lvls</h3>

<p>
Responsável por armazenar os níveis de acesso disponíveis no sistema, definindo quais permissões cada usuário possui.
</p>

<h3>usuarios</h3>

<p>
Responsável por armazenar os usuários cadastrados, suas senhas criptografadas e o nível de acesso associado a cada conta.
</p>

<p>
As duas tabelas são relacionadas pelo campo id_lvl, permitindo controlar as permissões de cada usuário dentro do sistema.
</p>

<hr>

<h2>Estrutura do Projeto</h2>

<p>
Os arquivos foram organizados de forma simples para facilitar a manutenção e o entendimento do projeto.
</p>

<ul>
    <li>Logar.php - tela de login</li>
    <li>VerificarLogin.php - valida usuário e senha</li>
    <li>Entrada.php - página principal após o login</li>
    <li>ControleEntrada.php - proteção das páginas internas</li>
    <li>Adicionarusuario.php - cadastro de novos usuários</li>
    <li>gerenciamentousuario.php - gerenciamento dos usuários cadastrados</li>
    <li>Cifrar.php - criptografia das senhas</li>
    <li>linkagemdb.php - conexão com o banco de dados</li>
    <li>Deslogar.php - encerramento da sessão</li>
</ul>

<hr>

<h2>Como executar</h2>

<ol>
    <li>Instale o XAMPP.</li>
    <li>Inicie os serviços Apache e MySQL.</li>
    <li>Importe o banco de dados estoque_db.</li>
    <li>Coloque os arquivos do projeto dentro da pasta htdocs.</li>
    <li>Acesse o sistema através do navegador utilizando o localhost.</li>
</ol>

<hr>

<h2>Próximas melhorias</h2>

<ul>
    <li>Adicionar CSS para melhorar a aparência do sistema</li>
    <li>Organizar melhor as telas</li>
    <li>Criar o cadastro de produtos</li>
    <li>Adicionar consulta de produtos em estoque</li>
    <li>Registrar produtos que saíram do estoque com data, horário e quantidade</li>
    <li>Implementar edição e exclusão de registros</li>
    <li>Melhorar as validações dos formulários</li>
    <li>Tornar o sistema mais próximo de uma aplicação real</li>
</ul>

<hr>

<h2>Histórico de Versões</h2>

<p>
Abaixo estão registradas as principais alterações realizadas durante o desenvolvimento do projeto.
</p>

<h3>v1.0</h3>

<ul>
    <li>Estrutura inicial do sistema</li>
    <li>Conexão com banco de dados</li>
    <li>Sistema de login</li>
    <li>Cadastro de usuários</li>
    <li>Controle de níveis de acesso</li>
</ul>

<h3>v1.1</h3>

<ul>
    <li>Correção do sistema de autenticação</li>
    <li>Correção da criptografia de senhas</li>
    <li>Ajuste das consultas SQL</li>
    <li>Correção do gerenciamento de sessões</li>
    <li>Correção do processo de logoff</li>
    <li>Melhor organização dos arquivos do projeto</li>
</ul>

<p>
Novas funcionalidades serão adicionadas nas próximas versões conforme o desenvolvimento do sistema avançar.
</p>

<hr>

<h2>Autor</h2>

<p>
João Pedro Cortes da Silva Sedenho
</p>
