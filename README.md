# RavenA - Personal Resume Website - https://ravenalvarez.laravel.cloud/

A modern, full-stack personal resume website built with Laravel 12, Vue 3, and Inertia.js. This application provides a beautiful public-facing resume display with a complete admin panel for managing resume content.

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![Vue.js](https://img.shields.io/badge/Vue.js-3-green?logo=vue.js)
![Inertia.js](https://img.shields.io/badge/Inertia.js-2-purple)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?logo=mysql)

## 📋 Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Database Schema](#database-schema)
- [Installation](#installation)
- [Usage](#usage)
- [Admin Panel](#admin-panel)
- [Project Structure](#project-structure)
- [Development](#development)
- [Deployment](#deployment)

## ✨ Features

### Public Features
- **Responsive Resume Display**: Beautiful, mobile-friendly resume layout
- **Dynamic Content**: All content is database-driven and easily editable
- **Professional Layout**: Clean design with sections for:
  - Profile/Contact Information
  - Professional Summary
  - Work Experience (with current position indicator)
  - Education
  - Technical Skills (grouped by category)
  - Projects (with technology tags)
- **Direct Access Links**: LinkedIn, GitHub, email, and website links

### Admin Features
- **Secure Authentication**: Laravel Breeze authentication system
- **Dashboard**: Overview with statistics for all resume sections
- **Complete CRUD Operations**:
  - Profile Management
  - Experience Entries (with order control)
  - Education Entries
  - Skills (with categories and proficiency levels)
  - Projects (with technology arrays)
- **User-Friendly Forms**: Validation and error handling
- **Flash Messages**: Success/error notifications
- **Quick Navigation**: Easy access to all management sections

## 🛠 Tech Stack

### Backend
- **Laravel 12**: Modern PHP framework with latest features
- **PHP 8.2+**: Latest PHP version for performance and features
- **MySQL 8.0**: Relational database for data persistence
- **Laravel Breeze**: Authentication scaffolding

### Frontend
- **Vue 3**: Progressive JavaScript framework (Composition API)
- **Inertia.js 2.0**: Modern monolith architecture (no API needed)
- **Tailwind CSS**: Utility-first CSS framework
- **Vite**: Fast build tool and dev server

### DevOps & Tools
- **Laravel Herd**: Native PHP development environment for macOS and Windows
- **Composer**: PHP dependency management
- **NPM**: JavaScript package management
- **Git**: Version control

## 🗄 Database Schema

### Tables

#### `profiles`
Stores personal profile information (single record)
- `id`, `name`, `title`, `email`, `phone`, `location`
- `linkedin`, `github`, `website`
- `summary`, `profile_image`
- `timestamps`

#### `experiences`
Work experience entries
- `id`, `company`, `position`, `location`
- `start_date`, `end_date`, `current` (boolean)
- `description`, `order`
- `timestamps`

#### `education`
Educational background
- `id`, `institution`, `degree`, `field_of_study`
- `location`, `start_date`, `end_date`
- `gpa`, `description`, `order`
- `timestamps`

#### `skills`
Technical skills with categories
- `id`, `name`, `category`
- `proficiency` (0-100), `order`
- `timestamps`

#### `projects`
Portfolio projects
- `id`, `name`, `description`
- `url`, `github_url`
- `technologies` (JSON array)
- `start_date`, `end_date`, `order`
- `timestamps`

#### `users`
Admin users for authentication
- `id`, `name`, `email`
- `password`, `remember_token`
- `email_verified_at`, `timestamps`

## 📦 Installation

### Prerequisites
- **Laravel Herd** (includes PHP 8.2+, Composer, and local MySQL/PostgreSQL)
  - Download from [herd.laravel.com](https://herd.laravel.com)
  - Automatically configures local `.test` domains
- **Node.js & NPM** (for asset compilation)
- **Git** (for version control)

### About Laravel Herd
This project is optimized for **Laravel Herd**, which provides:
- ✅ Built-in PHP 8.2+ with all required extensions
- ✅ Automatic `.test` domain configuration (e.g., `ravena.test`)
- ✅ Integrated database management (MySQL/PostgreSQL)
- ✅ No need for separate server setup
- ✅ Native performance (no Docker overhead)
- ✅ One-click PHP version switching

### Step-by-Step Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/alvarezrvn/ra-resume-site.git
   cd ra-resume-site
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install --legacy-peer-deps
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**

   Edit `.env` file:
   ```env
   APP_NAME=RavenA
   APP_URL=http://localhost:8000

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ra_resume_site
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Create database**

   **Using Laravel Herd:**
   - Herd automatically creates the database when running migrations
   - Database will be created automatically with default credentials

   **Manual MySQL Setup:**
   ```bash
   mysql -u root -p
   CREATE DATABASE ra_resume_site;
   exit;
   ```

7. **Run migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed database with resume data**
   ```bash
   php artisan db:seed --class=ResumeDataSeeder
   ```

9. **Create admin user**
   ```bash
   php artisan tinker
   # In tinker:
   User::create([
       'name' => 'Your Name',
       'email' => 'your@email.com',
       'password' => bcrypt('password')
   ]);
   exit
   ```

10. **Build assets**
    ```bash
    npm run build
    # OR for development with hot reload:
    npm run dev
    ```

11. **Start the application**

    **Using Laravel Herd:**
    ```bash
    # Herd automatically serves the app
    # Access via: http://ra-resume-site.test
    # Or: http://ravena.test
    ```

    **Using Laravel Artisan (alternative):**
    ```bash
    php artisan serve
    # Access via: http://localhost:8000
    ```

### 🚀 Quick Start with Laravel Herd

If you're using Laravel Herd, here's the fastest setup:

1. **Clone and navigate**
   ```bash
   cd ~/Herd  # Or your Herd directory (e.g., C:\Users\YourName\Herd on Windows)
   git clone https://github.com/alvarezrvn/ra-resume-site.git
   cd ra-resume-site
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install --legacy-peer-deps
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations and seed**
   ```bash
   php artisan migrate  # Herd creates database automatically
   php artisan db:seed --class=ResumeDataSeeder
   ```

5. **Build assets**
   ```bash
   npm run build
   ```

6. **Access the site**
   - Open browser to: `http://ra-resume-site.test` or `http://ravena.test`
   - Herd automatically detects and serves the Laravel app!

Visit your configured domain to see your resume!

## 🚀 Usage

### Viewing the Resume
- Navigate to the homepage: `http://localhost:8000`
- All resume information is displayed in a clean, professional layout
- Responsive design works on mobile, tablet, and desktop

### Accessing Admin Panel
1. Click "Login" button (bottom right on homepage)
2. Login with your admin credentials
3. Access dashboard at `/admin/dashboard`

## 🔐 Admin Panel

### Default Credentials (After Seeding)
- **Email**: alvarezrvn@gmail.com
- **Password**: password
- **⚠️ Change these in production!**

### Admin Routes
- `/admin/dashboard` - Main dashboard with statistics
- `/admin/profile` - View profile
- `/admin/profile/edit` - Edit profile information
- `/admin/experiences` - Manage work experience
- `/admin/education` - Manage education
- `/admin/skills` - Manage skills
- `/admin/projects` - Manage projects

### Managing Content

#### Profile
- Only one profile record exists
- Edit contact information, title, and professional summary
- Add social media links (LinkedIn, GitHub, personal website)

#### Experience
- Add/Edit/Delete work experience entries
- Mark current positions with checkbox
- Use `order` field to control display sequence
- Supports rich text descriptions with bullet points

#### Education
- Add multiple degrees/certifications
- Optional GPA field
- Date ranges for attendance

#### Skills
- Organize by categories (Languages, Frameworks, Tools, etc.)
- Set proficiency levels (0-100)
- Display order control

#### Projects
- Showcase portfolio projects
- Tag with technologies (stored as JSON array)
- Optional project URLs and GitHub links

## 📁 Project Structure

```
ra-resume-site/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin panel controllers
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── ProfileController.php
│   │   │   │   ├── ExperienceController.php
│   │   │   │   ├── EducationController.php
│   │   │   │   ├── SkillController.php
│   │   │   │   └── ProjectController.php
│   │   │   ├── Auth/               # Authentication controllers
│   │   │   └── ResumeController.php # Public resume display
│   │   └── Middleware/
│   └── Models/                     # Eloquent models
│       ├── Profile.php
│       ├── Experience.php
│       ├── Education.php
│       ├── Skill.php
│       ├── Project.php
│       └── User.php
├── database/
│   ├── migrations/                 # Database schema migrations
│   └── seeders/
│       └── ResumeDataSeeder.php   # Resume data seeder
├── resources/
│   ├── js/
│   │   ├── Components/            # Reusable Vue components
│   │   ├── Layouts/               # Page layouts
│   │   │   ├── AuthenticatedLayout.vue
│   │   │   └── GuestLayout.vue
│   │   └── Pages/
│   │       ├── Admin/             # Admin panel pages
│   │       │   ├── Dashboard.vue
│   │       │   ├── Profile/
│   │       │   ├── Experience/
│   │       │   ├── Education/
│   │       │   ├── Skill/
│   │       │   └── Project/
│   │       ├── Auth/              # Authentication pages
│   │       └── Resume/
│   │           └── Index.vue      # Public resume page
│   └── css/
│       └── app.css                # Tailwind CSS
├── routes/
│   ├── web.php                    # Application routes
│   └── auth.php                   # Authentication routes
├── .env                           # Environment configuration
├── composer.json                  # PHP dependencies
├── package.json                   # JavaScript dependencies
├── vite.config.js                 # Vite configuration
└── tailwind.config.js             # Tailwind configuration
```

## 💻 Development

### Running Development Server

**With Laravel Herd (Recommended):**
```bash
# No need to run php artisan serve - Herd handles it!
# Just run the Vite dev server for hot reload
npm run dev

# Access your site at:
# http://ra-resume-site.test or http://ravena.test
```

**Without Herd:**
```bash
# Terminal 1 - Laravel server
php artisan serve

# Terminal 2 - Vite dev server (hot reload)
npm run dev

# Access your site at:
# http://localhost:8000
```

### Building for Production
```bash
npm run build
```

### Common Artisan Commands
```bash
# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Run migrations
php artisan migrate
php artisan migrate:fresh --seed  # Fresh database with seeded data

# Create new components
php artisan make:model ModelName -m    # Model with migration
php artisan make:controller ControllerName
php artisan make:seeder SeederName
```

## 🌐 Deployment

### Production Checklist
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Generate app key: `php artisan key:generate`
- [ ] Set proper `APP_URL` in `.env`
- [ ] Configure production database credentials
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `npm run build`
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Seed data: `php artisan db:seed --class=ResumeDataSeeder`
- [ ] Set proper file permissions (storage and bootstrap/cache)
- [ ] Configure web server (Apache/Nginx)
- [ ] Set up SSL certificate
- [ ] Change default admin password
- [ ] Set up backups for database

### Recommended Hosting
- **Laravel Forge**: Automated server management
- **Laravel Vapor**: Serverless deployment on AWS
- **DigitalOcean**: VPS with Laravel optimization
- **Shared Hosting**: cPanel with PHP 8.2+ support

## 🔧 Customization

### Changing Colors/Styling
Edit `resources/css/app.css` or Vue components directly. The project uses Tailwind CSS utility classes.

### Adding New Resume Sections
1. Create migration for new table
2. Create model with fillable fields
3. Create controller with CRUD methods
4. Add routes in `routes/web.php`
5. Create Vue components for admin forms
6. Update public resume page to display new section

### Modifying Resume Layout
Edit `resources/js/Pages/Resume/Index.vue` to change the public resume appearance.

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👤 Author

**Raven Alvarez**
- GitHub: [@alvarezrvn](https://github.com/alvarezrvn)
- LinkedIn: [linkedin.com/in/alvarezrvn](https://linkedin.com/in/alvarezrvn)
- Email: alvarezrvn@gmail.com

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com)
- Development environment by [Laravel Herd](https://herd.laravel.com)
- Frontend powered by [Vue.js](https://vuejs.org) and [Inertia.js](https://inertiajs.com)
- Styled with [Tailwind CSS](https://tailwindcss.com)
- Authentication by [Laravel Breeze](https://laravel.com/docs/starter-kits)

---

**Project Created**: March 5, 2026
**Last Updated**: March 5, 2026

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
