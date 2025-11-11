# JCar — Sistema de Venda de Veículos (Laravel)

Aplicação Laravel com área pública (listagem/detalhe de veículos) e área administrativa (CRUD de Marcas, Modelos, Cores e Veículos).

## 📦 Requisitos
- PHP 8.3.x ou superior.
- Composer
- MySQL

## 🚀 Como rodar o projeto

```bash
# 1) Clonar
git clone https://github.com/joaogflima/site-laravel-jcar.git
cd site-laravel-jcar

# 2) Instalar dependências PHP
composer install

# 3) Banco de dados
# Crie o banco 'jcar' no MySQL (utf8mb4). Exemplo:
# CREATE DATABASE jcar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
## 3.1) (Verifique as credenciais no .env local)
    Configuração esperada:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=jcar
    DB_USERNAME=root
    DB_PASSWORD=

# 4) Estrutura do banco (migrations)
php artisan migrate

# 5) Popular dados iniciais (seed SQL com imagens e usuário admin)
# O arquivo está em database/seeders/seed_jcar.sql
# Execute o seguinte comando pelo terminal cmd.exe dentro do caminho onde está localizado seu projeto (Não funciona no powershell):
"C:\xampp\mysql\bin\mysql.exe" -u root -p jcar < database/seeders/seed_jcar.sql

# 6) Rodar a aplicação
php artisan serve
# Acesse http://127.0.0.1:8000
````
## 🔐 Acesso do Administrador

Usuário: admin@site.com

Senha: password


## 🗂️ Estrutura (principais)

- app/Models → Modelos

- app/Http/Controllers → Controllers (público e admin)

- resources/views → Views Blade (layouts e páginas)

- routes/web.php → Rotas

- database/migrations → Migrations

- database/seeders/seed_jcar.sql → Seed SQL com dados fictícios (cores, marcas, modelos, veículos e usuário admin)


# Imagens – Jcar


# 1.	Área pública – (views/layouts/template_home)
<img width="886" height="450" alt="image" src="https://github.com/user-attachments/assets/f5a48222-7fc5-4ab1-bed2-48a847a37d3c" />
 
## 1.1.	Conteúdo principal, filtros funcionais.
<img width="886" height="405" alt="image" src="https://github.com/user-attachments/assets/147c86f4-6093-4017-82b8-f5c3fab73ae8" />

## 1.2.	Rodapé
<img width="886" height="404" alt="image" src="https://github.com/user-attachments/assets/f1bbbda1-7ead-46fb-b79c-9f7f39afac00" />
 
## 1.3.	Conteúdo especifico de veiculo
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/9e08aa66-7cdc-4d62-8d0f-ac6f3426d62f" />

## 1.4.	Conteúdo sobre a empresa, com header diferente
<img width="886" height="405" alt="image" src="https://github.com/user-attachments/assets/e46efdf8-5e72-46e2-b284-84fd57c1acd1" /> 
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/4481f9f4-4794-4230-86c4-f245a34870d9" />
<img width="886" height="405" alt="image" src="https://github.com/user-attachments/assets/7a912ea4-9075-408f-9b85-99ee4f3eba77" />
<img width="886" height="403" alt="image" src="https://github.com/user-attachments/assets/345fb102-5839-4fe5-af9d-2bcb10dbaa74" />
<img width="886" height="405" alt="image" src="https://github.com/user-attachments/assets/adfeb27b-0436-42b2-9450-8772eaf3f58a" />
<img width="886" height="407" alt="image" src="https://github.com/user-attachments/assets/a937dbc6-2994-4530-a254-41d477a5ec51" />

## 1.5.	Login
<img width="886" height="408" alt="image" src="https://github.com/user-attachments/assets/71f08a63-bc03-4885-9e60-70ae46e0b3b7" />

## 1.6.	Register
<img width="886" height="404" alt="image" src="https://github.com/user-attachments/assets/05e858fb-ddea-4c33-be2e-c31d7eb5851c" />

## 1.7.	Homepage logada
<img width="886" height="407" alt="image" src="https://github.com/user-attachments/assets/4de2765f-5f02-4973-be4c-f17d00db29a9" />

# 2.	Área administrativa– (views/layouts/template_admin)
<img width="886" height="401" alt="image" src="https://github.com/user-attachments/assets/f0649ec8-2855-4f1c-8e91-34c82313d5ab" />

## 2.1.	Criação, Edição e Exclusão de Veículos
<img width="886" height="404" alt="image" src="https://github.com/user-attachments/assets/e6bd83b3-f378-423d-8c31-d4e5aaf000f8" />
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/f3ce165e-34f1-4715-b5b1-92405d468c74" />
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/db51e674-466d-4810-bb58-c3b8d9d6c1ec" />
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/d92a29b3-35c8-486c-abe5-12d49b542a46" />

## 2.2.	Criação, Edição e Exclusão de Marcas
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/baaed75f-9038-4c9d-a475-a44ab1476d90" />
<img width="886" height="407" alt="image" src="https://github.com/user-attachments/assets/6712bb05-55cf-4b38-b19f-8071e9744864" />
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/ce78d3b5-0f05-4784-8320-fe5f78dab15d" />
<img width="886" height="407" alt="image" src="https://github.com/user-attachments/assets/1676c84a-05bf-493d-9a16-c2c04a9dd0db" />
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/1e11ec18-e9e0-4396-9e6c-20a374e40843" />
<img width="886" height="404" alt="image" src="https://github.com/user-attachments/assets/3c123862-a46b-467e-823c-e80f8aa7cfa4" />

## 2.3.	Criação, Edição e Exclusão de Modelos
<img width="886" height="404" alt="image" src="https://github.com/user-attachments/assets/354c9960-7e99-4a87-9206-7805f2df5acf" />
<img width="886" height="407" alt="image" src="https://github.com/user-attachments/assets/e5bd4ef8-959e-4564-82e4-282765a8d164" />
<img width="886" height="405" alt="image" src="https://github.com/user-attachments/assets/e7a6232c-c635-4a0a-9810-4937f8b72fc7" />
<img width="886" height="409" alt="image" src="https://github.com/user-attachments/assets/2054d917-a623-4557-860d-9180dc067610" />
<img width="886" height="404" alt="image" src="https://github.com/user-attachments/assets/981f4f71-1722-412e-af8e-d79301345f9c" />

## 2.4.	Criação, Edição e Exclusão de Cores
<img width="886" height="402" alt="image" src="https://github.com/user-attachments/assets/cac862d1-3f37-49ba-87b8-fd8842cf579e" />
<img width="886" height="406" alt="image" src="https://github.com/user-attachments/assets/2e42b312-d915-4a4d-a77f-1cc91fd7b4d4" />
<img width="886" height="405" alt="image" src="https://github.com/user-attachments/assets/448f32c5-606c-4701-955d-f97f5958402f" />
<img width="886" height="405" alt="image" src="https://github.com/user-attachments/assets/55599913-46b7-44f0-b552-e958e1e98cf7" />

 
 
 

