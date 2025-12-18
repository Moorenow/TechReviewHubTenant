<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# Example Tenancy

Ejemplo de aplicación **multi-tenant por dominio** en Laravel usando `stancl/tenancy`, con frontend Vue 3.

## Stack

- Backend: Laravel 12 / PHP 8.2+
- Multitenancy: `stancl/tenancy`
- Frontend: Vue 3 

## Requisitos

- PHP 8.2+, Composer
- Node.js + npm
- Base de datos: MySQL/PostgreSQL 
  - Si usas MySQL/PostgreSQL: el usuario necesita permisos para **crear** BD (se crea 1 BD por tenant).

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
npm install
npm run dev
```

## Variables de entorno (mínimas)

- `APP_URL`: URL “central” (tu app base).
- `APP_URL_TENANT`: **dominio central**.
  - Ejemplo con un dominio local:
    - `APP_URL=http://exampleTenancy.test:8000`
    - `APP_URL_TENANT=exampleTenancy.test`

## Cómo funciona el multi-tenancy en este repositorio

- **Central DB**: migraciones en `database/migrations` (tablas `tenants` y `domains`).
- **Tenant DB**: migraciones en `database/migrations/tenant` (por defecto: `users`, `cache`, `jobs`, `sessions`, etc.).
- Al crear un tenant, se ejecutan migraciones y hace seed (ver `app/Providers/TenancyServiceProvider.php`).
- Rutas:
  - Central: `routes/web.php`
  - Tenant: `routes/tenant.php` 

## Crear un tenant (local)

```bash
php artisan tinker
>>> $tenant = App\Models\Tenant::create(['id' => 'dealer']);
>>> $tenant->domains()->create(['domain' => 'dealer.exampleTenancy.test']);
```

Luego abre `https://dealer.exampleTenancy.test`.


Comandos útiles:

```bash
php artisan tenants:list
php artisan tenants:migrate
php artisan tenants:seed
php artisan tenants:run route:list
```

