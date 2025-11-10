# JCar — Sistema de Venda de Veículos (Laravel)

Aplicação Laravel com área pública (listagem/detalhe de veículos) e área administrativa (CRUD de Marcas, Modelos, Cores e Veículos).

## 📦 Requisitos
- PHP 8.x
- Composer
- MySQL

## 🚀 Como rodar o projeto

```bash
# 1) Clonar
git clone https://github.com/joaogflima/site-laravel-jcar
cd SEU_REPO

# 2) Dependências
composer install

# 3) Ambiente
cp .env.example .env
php artisan key:generate

# 4) Banco de dados
# Crie o banco 'jcar' no MySQL (utf8mb4)
# Edite .env com DB_DATABASE=jcar, DB_USERNAME, DB_PASSWORD

# 5) Estrutura do banco
php artisan migrate

# 6) (Opcional) Popular dados iniciais com SQL
# O arquivo está em database/seeders/seed_jcar.sql
mysql -u root -p jcar < database/seeders/seed_jcar.sql

# 7) (Opcional) Front
# npm install
# npm run build

# 8) Rodar
php artisan serve