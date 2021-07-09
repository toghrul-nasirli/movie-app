# MovieApp

Simple movie app that shows movies, tv shows and people. It is written on TALL stack(Tailwind CSS, Alpine.js, Laravel and Livewire) using TMDb API.

## Installation

```bash
# Installing Dependencies
composer install
npm install && npm run dev

# Create a mysql database and edit the ".env" file as you like

# Create symbolic link configured for the application
php artisan storage:link

# Generate an encryption key
php artisan key:generate

# Running Migrations and Seeds
php artisan migrate --seed
```
