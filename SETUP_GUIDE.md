# Quick Setup Guide - RavenA Resume Site

This guide will help you get the RavenA resume site up and running quickly.

## Prerequisites Checklist

Before you begin, make sure you have:
- [ ] PHP 8.2 or higher (`php -v` to check)
- [ ] Composer installed (`composer -V` to check)
- [ ] Node.js and NPM (`node -v` and `npm -v` to check)
- [ ] MySQL 8.0+ installed and running
- [ ] Git installed

## 5-Minute Setup

### 1. Clone and Install Dependencies (2 minutes)

```bash
# Clone the repository
git clone https://github.com/alvarezrvn/ra-resume-site.git
cd ra-resume-site

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install --legacy-peer-deps
```

### 2. Environment Setup (1 minute)

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Configure Database (1 minute)

Edit `.env` file and update these lines:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ra_resume_site
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

Create the database:

```bash
# Option 1: Using MySQL command line
mysql -u root -p
CREATE DATABASE ra_resume_site;
exit;

# Option 2: Using Laravel (it will prompt you)
php artisan migrate
# Select 'yes' when asked to create database
```

### 4. Database Setup (1 minute)

```bash
# Run migrations
php artisan migrate

# Seed with resume data
php artisan db:seed --class=ResumeDataSeeder

# Create admin user
php artisan tinker
```

In Tinker, run:
```php
User::create([
    'name' => 'Your Name',
    'email' => 'your@email.com',
    'password' => bcrypt('password')
]);
exit
```

### 5. Build and Run (30 seconds)

```bash
# Build frontend assets
npm run build

# Start the server
php artisan serve
```

Visit: **http://localhost:8000**

## Quick Access

- **Public Resume**: http://localhost:8000
- **Login Page**: http://localhost:8000/login
- **Admin Dashboard**: http://localhost:8000/admin/dashboard

## Default Admin Credentials

After seeding:
- **Email**: alvarezrvn@gmail.com
- **Password**: password

⚠️ **Change these after first login!**

## Development Mode

For active development with hot reload:

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

## Common Issues & Solutions

### Issue: Port 8000 already in use
**Solution**: Use a different port
```bash
php artisan serve --port=8080
```

### Issue: npm install fails
**Solution**: Use legacy peer deps flag
```bash
npm install --legacy-peer-deps
```

### Issue: Database connection error
**Solution**: Verify MySQL is running and credentials are correct
```bash
# Test MySQL connection
mysql -u root -p

# Check if database exists
SHOW DATABASES;
```

### Issue: Permission denied errors
**Solution**: Set proper permissions (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
```

### Issue: Vite manifest not found
**Solution**: Build the assets
```bash
npm run build
```

### Issue: 419 Page Expired error
**Solution**: Clear config cache
```bash
php artisan config:clear
php artisan cache:clear
```

## Updating Resume Data

### Option 1: Through Admin Panel
1. Login at `/login`
2. Navigate to admin sections
3. Edit, add, or delete entries

### Option 2: Update Seeder
1. Edit `database/seeders/ResumeDataSeeder.php`
2. Run fresh migration:
```bash
php artisan migrate:fresh --seed
```

## Customizing the Site

### Change Site Name
Edit `.env`:
```env
APP_NAME="Your Site Name"
```

### Change Colors/Styling
Edit Vue components in `resources/js/Pages/`

### Add New Features
1. Create migration: `php artisan make:migration create_table_name`
2. Create model: `php artisan make:model ModelName`
3. Create controller: `php artisan make:controller ControllerName`
4. Add routes in `routes/web.php`
5. Create Vue components in `resources/js/Pages/`

## Deployment

### Before Deploying:
```bash
# Set production environment
APP_ENV=production
APP_DEBUG=false

# Optimize
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Deployment Checklist:
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Update `APP_URL` to your domain
- [ ] Use strong database password
- [ ] Change default admin password
- [ ] Set up SSL certificate
- [ ] Configure proper file permissions
- [ ] Set up automated backups
- [ ] Configure email settings (if using)

## Getting Help

- Check the main [README.md](README.md) for detailed documentation
- Review [CHANGELOG.md](CHANGELOG.md) for version history
- Laravel Documentation: https://laravel.com/docs
- Vue.js Documentation: https://vuejs.org/guide
- Inertia.js Documentation: https://inertiajs.com

## Quick Command Reference

```bash
# Artisan commands
php artisan serve              # Start development server
php artisan migrate            # Run database migrations
php artisan migrate:fresh      # Drop all tables and re-migrate
php artisan db:seed            # Seed database
php artisan tinker             # Open interactive shell
php artisan cache:clear        # Clear application cache
php artisan config:clear       # Clear config cache

# NPM commands
npm install                    # Install dependencies
npm run dev                    # Start dev server with hot reload
npm run build                  # Build for production

# Git commands
git status                     # Check repository status
git add .                      # Stage all changes
git commit -m "message"        # Commit changes
git push                       # Push to remote repository
```

## Success!

If you've followed all steps, you should now have:
- ✅ A working Laravel application
- ✅ Database with your resume data
- ✅ Admin panel access
- ✅ Public resume page

Happy coding! 🚀
