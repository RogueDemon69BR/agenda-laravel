
![GEzuAMwXQAAYKSL](https://github.com/user-attachments/assets/7fe12dc9-701d-4b64-b759-c53a5f3878c4)



Copiado dos brode do pi não, isso aqui é uma homenagem a eles pq são brabo d+:

Antes de começar, certifique-se de que você tem os seguintes softwares instalados em sua máquina:

* PHP (versão 8.1 ou superior)
* Composer
* Node.js e NPM
* Um servidor de banco de dados (MySQL, PostgreSQL, etc.)
* Git

## ⚙️ Instalação

Siga os passos abaixo para configurar o ambiente de desenvolvimento em sua máquina local.

**1. Clonar o Repositório**

```bash
git clone https://github.com/RogueDemon69BR/agenda-laravel.git
ou façam o download diretamente pelo github
```

**2. Instalar Dependências do PHP**

Use o Composer para instalar todos os pacotes PHP necessários.

```bash
composer install
```

**3. Instalar Dependências do JavaScript**

Use o NPM para instalar as dependências de front-end.

```bash
npm install
```

**4. Compilar os Assets**

Compile os arquivos de front-end (CSS, JS) com o seguinte comando.

```bash
npm run build
```

## 🛠️ Configuração

O projeto precisa de um arquivo de ambiente (`.env`) para definir as configurações específicas da sua máquina.

**1. Crie o Arquivo de Ambiente**

Copie o arquivo de exemplo `.env.example` para criar seu próprio arquivo de configuração.

```bash
cp .env.example .env
```

**2. Gere a Chave da Aplicação (APP_KEY)**

A `APP_KEY` é uma chave de 32 caracteres usada para criptografia. O Laravel fornece um comando para gerá-la de forma segura.

```bash
php artisan key:generate
```
Este comando irá criar uma chave única e inseri-la automaticamente no seu arquivo `.env`.

**3. Configure o Banco de Dados**

Abra o arquivo `.env` e configure as variáveis de conexão com o seu banco de dados local.

```ini
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

**4. Execute as Migrations**

Após configurar a conexão, execute as migrations para criar as tabelas necessárias no banco de dados.

```bash
php artisan migrate
```
## ▶️ Executando o Projeto

Para iniciar o servidor de desenvolvimento local, utilize o comando Artisan:

```bash
php artisan serve
```

A aplicação estará disponível em `http://127.0.0.1:8000` ou na porta que for indicada no terminal.
