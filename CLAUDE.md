# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Trayek is a Laravel 10 web application for managing transportation permits (SK/Surat Keputusan), vehicles (Kendaraan), routes (Trayek), and supervision records (Pengawasan). Built for Indonesian government transportation regulation.

**Stack**: Laravel 10, Livewire 3, Tailwind CSS, MySQL, Vite

## Common Commands

```bash
# Development
npm run dev              # Start Vite dev server (hot reload)
php artisan serve        # Start Laravel dev server (or use Laragon)

# Build
npm run build            # Build assets for production

# Database
php artisan migrate      # Run migrations
php artisan migrate:fresh --seed  # Reset and seed database

# Testing
./vendor/bin/phpunit     # Run all tests
./vendor/bin/phpunit tests/Feature/  # Feature tests only

# Code formatting
./vendor/bin/pint        # Format code with Laravel Pint

# Cache (production)
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

## Architecture

### Livewire-First Approach
Controllers are minimal. Most UI logic lives in **Livewire components** (`app/Livewire/`):
- `Dashboard.php` - Main dashboard with charts
- `Sk.php` - Permit management
- `DetailSk.php` - Permit detail view
- `Kendaraan.php` - Vehicle management
- `SkPengawasan.php` - Supervision records
- `Trayek.php` - Route management
- `Perusahaan.php` - Company management

Corresponding Blade views are in `resources/views/livewire/`.

### Key Models & Relationships
```
Trayek (routes) hasMany Sk
Kendaraan (vehicles) belongsTo Perusahaan, Trayek
Sk (permits) belongsTo Perusahaan, Trayek; hasOne SkPengawasan
User uses Laratrust for RBAC (roles & permissions)
```

### Helper Functions (`app/Helpers/General.php`)
- `tgl_indo($date)` - Format date to Indonesian
- `format_price($value)` - Format as Indonesian Rupiah
- `gen_nota()` - Generate sequential permit numbers
- `get_code($group)` / `list_code($group)` - Cached lookup codes from ComCode model
- `file_url($file)` - Get Google Cloud Storage URL

### Authorization
Uses **Laratrust** for role-based access control. Check `config/laratrust.php` for role/permission setup.

### File Storage
Files stored in **Google Cloud Storage** (configured in `config/filesystems.php`).

### Document Export
Word document generation via **PHPOffice/PhpWord** (see `ExportSkWord.php`).

## Routes

All routes require authentication (see `routes/web.php`):
- `/` or `/dashboard` - Dashboard
- `/sk` - Permit listing
- `/detail-sk/{id}` - Permit details
- `/sk-kendaraan` - SK-Vehicle mapping
- `/sk-pengawasan` - Supervision records
- `/master/*` - Master data (users, vehicles, companies, routes, department heads)

## Configuration Notes

- **Timezone**: Asia/Jakarta (UTC+7)
- **Locale**: Indonesian (`afrizalmy/laraindo`)
- **WhatsApp API**: Wablas integration configured in `config/app.php`
- **Auditing**: All model changes logged via `owen-it/laravel-auditing`
