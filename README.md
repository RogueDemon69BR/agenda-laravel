
![GEzuAMwXQAAYKSL](https://github.com/user-attachments/assets/7fe12dc9-701d-4b64-b759-c53a5f3878c4)

**1. Clonar o Repositório**

```bash

# Clonar repositório
git clone https://github.com/RogueDemon69BR/agenda-laravel.git
cd agenda-laravel

# Instalar dependências do Laravel
composer install

# Instalar dependências do Node.js
npm install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Criar tabelas do banco
php artisan migrate

# Compilar assets
npm run dev

# Rodar servidor local
php artisan serve

