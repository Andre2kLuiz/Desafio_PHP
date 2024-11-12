# Instruções para Iniciar o Projeto PHP Puro com XAMPP

# Requisitos

Antes de iniciar, verifique se você tem o XAMPP instalado em sua máquina. O XAMPP é um pacote que inclui Apache, MySQL e PHP, facilitando o desenvolvimento de aplicações PHP.

Passos para Instalar o XAMPP
Baixe e instale o XAMPP:

Acesse o site oficial: https://www.apachefriends.org
Escolha a versão do XAMPP para o seu sistema operacional e siga as instruções de instalação.
Verifique a instalação:

Abra o painel de controle do XAMPP e inicie os serviços Apache e MySQL.
Acesse o XAMPP no navegador em http://localhost. Você deverá ver a página inicial do XAMPP, o que significa que o servidor está funcionando corretamente.

# Passo 1: Clonar o Repositório

Clone o repositório para a sua máquina local usando o comando git clone:

bash
Copiar código
git clone https://github.com/usuario/repositorio.git
Substitua o URL do repositório com o link do seu projeto.

# Passo 2: Configurar o Banco de Dados (MySQL)

Acesse o phpMyAdmin:

Abra o painel de controle do XAMPP e clique em Admin ao lado do MySQL para abrir o phpMyAdmin.
O phpMyAdmin será aberto em http://localhost/phpmyadmin.
Crie o Banco de Dados:

No phpMyAdmin, clique em Novo e crie um banco de dados com o nome desejado.
Exemplo: Crie o banco de dados chamado associados_db.
Criar Tabelas:

Dentro do banco de dados criado, você pode criar as tabelas necessárias para o seu projeto. Se necessário, use o SQL para criar as tabelas.
Exemplo de tabela:
sql

CREATE TABLE associados (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
email VARCHAR(100),
data_filiacao DATE
);
Configurar as Credenciais de Banco de Dados:

Abra o arquivo config.php ou similar no seu projeto e defina as credenciais de conexão com o banco de dados. Exemplo:
php

<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');  // Senha padrão no XAMPP é vazia
define('DB_DATABASE', 'associados_db');

// Conexão com o banco de dados
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

# Passo 3: Configurar o Servidor Local

Se você não usar o servidor embutido do PHP, o XAMPP fornece o Apache para rodar o seu projeto localmente.

Mover o Projeto para o Diretório do XAMPP:

Localize o diretório de instalação do XAMPP (geralmente em C:\xampp ou C:\Program Files\xampp).
Vá até a pasta htdocs dentro do diretório do XAMPP, que é onde os projetos PHP devem ser colocados.
Mova ou copie o diretório do seu projeto para dentro da pasta htdocs.
Exemplo:

Se o nome do seu projeto for meu-projeto, mova o diretório para C:\xampp\htdocs\meu-projeto.
Iniciar o Servidor Apache:

Abra o painel de controle do XAMPP e inicie o Apache e o MySQL clicando no botão Start ao lado de cada serviço.
Acessar o Projeto no Navegador:

Abra o navegador e acesse o endereço http://localhost/meu-projeto. O seu projeto PHP estará disponível no servidor local.

# Passo 4: Testar o Projeto

Após configurar o banco de dados e o servidor web, você pode acessar o projeto no navegador:

Acesse o Projeto: No navegador, vá até http://localhost/meu-projeto (substitua meu-projeto pelo nome da pasta do seu projeto).
O sistema PHP deve ser carregado corretamente, e você poderá interagir com ele.
