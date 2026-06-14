<h1>Sistema de Controle de Estoque</h1>

<p>
A ideia principal deste projeto é desenvolver um sistema de controle de estoque utilizando PHP e MySQL. O projeto começou com a implementação do sistema de login, usuários e níveis de acesso e, aos poucos, vem recebendo novas funcionalidades relacionadas ao gerenciamento de estoque.
</p>

<p>
Durante o desenvolvimento, busco aplicar boas práticas de organização de código, separando arquivos por responsabilidade e mantendo a estrutura do projeto simples para facilitar futuras melhorias e manutenções.
</p>

<hr>

<h2>Tecnologias utilizadas</h2>

<ul>
    <li>PHP</li>
    <li>MySQL / MariaDB</li>
    <li>HTML</li>
    <li>XAMPP</li>
    <li>phpMyAdmin</li>
    <li>Git</li>
    <li>GitHub</li>
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
    <li>Permite cadastrar produtos</li>
    <li>Permite consultar os produtos cadastrados</li>
    <li>Registra automaticamente a data de entrada dos produtos</li>
</ul>

<hr>

<h2>Banco de Dados</h2>

<p>
O banco utilizado no projeto se chama estoque_db.
</p>

<p>
Atualmente ele possui três tabelas principais:
</p>

<h3>login_lvls</h3>

<p>
Responsável por armazenar os níveis de acesso do sistema, definindo as permissões de cada usuário.
</p>

<h3>usuarios</h3>

<p>
Responsável por armazenar os usuários cadastrados, suas senhas criptografadas e seus respectivos níveis de acesso.
</p>

<h3>produtos</h3>

<p>
Responsável por armazenar os produtos cadastrados no estoque.
</p>

<p>
Campos da tabela:
</p>

<ul>
    <li>Código do produto</li>
    <li>Nome do produto</li>
    <li>Descrição</li>
    <li>Preço</li>
    <li>Quantidade</li>
    <li>Data de entrada</li>
    <li>Status ativo/inativo</li>
</ul>

<hr>

<h2>Organização dos Arquivos</h2>

<p>
A estrutura do projeto foi organizada de forma simples, separando cada funcionalidade em arquivos específicos.
</p>

<ul>
    <li>Logar.php - Tela de login</li>
    <li>VerificarLogin.php - Validação do login</li>
    <li>Entrada.php - Página principal após autenticação</li>
    <li>ControleEntrada.php - Proteção das páginas</li>
    <li>Adicionarusuario.php - Cadastro de usuários</li>
    <li>gerenciamentousuario.php - Gerenciamento de usuários</li>
    <li>CadastrarProdutos.php - Cadastro de produtos</li>
    <li>ConsultarProdutos.php - Consulta de produtos cadastrados</li>
    <li>Cifrar.php - Criptografia de senhas</li>
    <li>linkagemdb.php - Conexão com banco de dados</li>
    <li>Deslogar.php - Encerramento da sessão</li>
</ul>

<hr>

<h2>Como executar o projeto</h2>

<ol>
    <li>Instalar o XAMPP</li>
    <li>Iniciar o Apache e o MySQL</li>
    <li>Importar o banco de dados estoque_db</li>
    <li>Colocar os arquivos dentro da pasta htdocs</li>
    <li>Acessar o sistema pelo navegador utilizando localhost</li>
</ol>

<hr>

<h2>Próximas melhorias</h2>

<ul>
    <li>Adicionar CSS para melhorar a aparência do sistema</li>
    <li>Organizar melhor as telas</li>
    <li>Implementar edição de produtos</li>
    <li>Implementar desativação de produtos</li>
    <li>Criar registro de saída de produtos</li>
    <li>Registrar data, horário e quantidade das saídas</li>
    <li>Adicionar consulta de movimentações de estoque</li>
    <li>Melhorar as validações dos formulários</li>
    <li>Deixar o sistema mais completo e próximo de uma aplicação real</li>
</ul>

<hr>

<h2>Autor</h2>

<p>
João Pedro Cortes da Silva Sedenho
</p>

<hr>

<h2>Histórico de Versões</h2>

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

<h3>v1.2</h3>

<ul>
    <li>Criação da tabela de produtos</li>
    <li>Cadastro de produtos</li>
    <li>Consulta de produtos em estoque</li>
    <li>Controle de produtos ativos e inativos</li>
    <li>Registro automático da data de entrada dos produtos</li>
    <li>Formatação de data para o padrão brasileiro</li>
    <li>Integração do módulo de produtos ao menu principal do sistema</li>
</ul>

<h3>v1.3</h3>

<ul>
    <li>Implementação da edição de produtos</li>
    <li>Criação da área de produtos desativados</li>
    <li>Possibilidade de desativar produtos sem removê-los do banco de dados</li>
    <li>Possibilidade de reativar produtos desativados</li>
    <li>Melhoria na consulta de produtos</li>
    <li>Proteção da quantidade de estoque contra alterações manuais</li>
</ul>

<h3>v1.4</h3>

<ul>
    <li>Implementação da entrada de estoque</li>
    <li>Implementação da saída de estoque</li>
    <li>Criação do histórico de movimentações</li>
    <li>Registro automático de entradas e saídas de produtos</li>
    <li>Registro do usuário responsável por cada movimentação</li>
    <li>Registro automático da data e hora das movimentações</li>
    <li>Desativação automática de produtos com estoque zerado</li>
    <li>Reativação automática de produtos ao receber nova entrada de estoque</li>
    <li>Separação entre cadastro de produtos e movimentação de estoque</li>
    <li>Criação da página de consulta do histórico de movimentações</li>
</ul>
