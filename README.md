# AAPSCM Laravel Platform

A clean, production-ready Laravel application for the AAPSCM web platform.

## Tech Stack

- **Laravel 13** (latest stable)
- **Blade Templates** (primary frontend)
- **Vue.js** (optional, for interactive components)
- **Filament 5** Admin Panel
- **Spatie Laravel Permission** for RBAC

## Requirements

- PHP 8.3+
- Composer 2.x
- Node.js 18+
- MySQL 8.0+ (or SQLite for development)

## Installation

```bash
# Clone the repository
git clone <repo-url>
cd aapscm-laravel

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your database in .env, then run migrations
php artisan migrate

# Seed sample data
php artisan db:seed

# Build frontend assets
npm run build

# Start development server
php artisan serve
```

## Development

```bash
# Start all development services
composer run dev
```

## Default Credentials (after seeding)

| Role    | Email                | Password |
|---------|----------------------|----------|
| Admin   | admin@example.com    | password |
| Member  | member@example.com   | password |
| Guest   | guest@example.com    | password |

## Admin Panel

Access the Filament admin panel at `/admin`

Login with an admin user account (admin@example.com / password after seeding).

## Project Structure

```
app/
├── Filament/
│   └── Resources/          # Filament admin panel resources
│       ├── UserResource.php
│       ├── ProductResource.php
│       └── PageResource.php
├── Models/                 # Eloquent models
│   ├── User.php
│   ├── Membership.php
│   ├── Product.php
│   ├── Order.php
│   ├── OrderItem.php
│   ├── Course.php
│   ├── Certification.php
│   └── Page.php
├── Repositories/           # Repository pattern
│   ├── Contracts/          # Repository interfaces
│   ├── BaseRepository.php
│   ├── UserRepository.php
│   ├── ProductRepository.php
│   └── PageRepository.php
├── Services/               # Business logic services
│   ├── UserService.php
│   ├── ProductService.php
│   └── PageService.php
└── Providers/
    └── AppServiceProvider.php  # Repository bindings

database/
├── migrations/             # All database migrations
└── seeders/                # Sample data seeders
    ├── RoleSeeder.php
    ├── UserSeeder.php
    ├── ProductSeeder.php
    └── PageSeeder.php
```

## Database Structure

- **users** - Core user accounts with Spatie roles
- **memberships** - User membership tiers and expiry
- **products** - Platform products/packages
- **orders** - User orders
- **order_items** - Individual items in orders
- **courses** - Available courses
- **certifications** - User course certifications
- **pages** - CMS pages

## Roles & Permissions

- **admin** - Full access to all features
- **member** - Access to products, orders, courses, certifications
- **guest** - Limited access
