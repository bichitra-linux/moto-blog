# Moto Blog

A Laravel-based blog website dedicated to providing comprehensive information about vehicles, with a special focus on motorcycles (moto). This platform features a hierarchical admin system where only authorized administrators can manage content, while the public can freely browse published articles without authentication.

## Features

- **Admin-Only Authentication**: Secure login system restricted to authorized administrators only
- **Two-Factor Authentication**: Enhanced security with 2FA support for admin accounts
- **Hierarchical Role-Based Access Control**: Four admin categories with different permissions
- **Director Dashboard (Super Admin)**: Full system access including user creation and management
- **Manager Dashboard**: Content oversight and administrative functions
- **Editor Dashboard**: Content creation and editing capabilities
- **SEO Specialist Dashboard**: SEO management and optimization tools
- **Public Interface**: Read-only access for browsing published content without authentication
- **Dynamic Components**: Interactive UI elements built with Livewire
- **Modern Frontend**: Responsive design with Vite for asset compilation
- **Blog Posts**: Create, read, and manage vehicle-related articles (admin-only creation/editing)
- **User Management**: Hierarchical user creation and role assignment (Director-only)
- **Testing**: Comprehensive test suite using Pest

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and npm
- MySQL, PostgreSQL, or SQLite database

### Steps

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd moto-blog
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```

4. **Environment Configuration:**
   - Copy `.env.example` to `.env`
   - Configure your database settings in `.env`

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations:**
   ```bash
   php artisan migrate
   ```

7. **Seed the Database (optional):**
   ```bash
   php artisan db:seed
   ```

8. **Build Frontend Assets:**
   ```bash
   npm run build
   ```

9. **Start the Development Server:**
   ```bash
   php artisan serve
   ```

10. **Compile Assets for Development (in a separate terminal):**
    ```bash
    npm run dev
    ```

## Usage

- Access the application at `http://localhost:8000`
- **Public Access**: Browse and read vehicle-related blog posts without authentication
- **Admin Access**: Login with authorized admin credentials (no public registration)
- **Director (Super Admin)**: Create and manage admin users across all categories
- **Manager**: Oversee content and administrative operations
- **Editor**: Create and edit vehicle-related articles
- **SEO Specialist**: Manage SEO settings and optimizations
- Only Directors can create new admin accounts and assign roles

## User Roles

- **Public Visitors**: Can browse and read all published blog posts without authentication (no registration required)
- **Director (Super Admin)**: Full system access, can create and manage all admin users, assign roles, and perform all administrative functions
- **Manager**: Content oversight, user management within their scope, and administrative operations
- **Editor**: Create, edit, and publish vehicle-related articles and content
- **SEO Specialist**: Manage search engine optimization, meta tags, and site visibility settings

## Technologies Used

- **Laravel**: PHP framework for backend development
- **Livewire**: For reactive, dynamic interfaces
- **Fortify**: Authentication scaffolding
- **Volt**: Modern view layer for Laravel
- **Vite**: Frontend build tool
- **Pest**: PHP testing framework
- **Blade**: Templating engine
- **MySQL/PostgreSQL**: Database options

## Project Structure

```
├── app/                    # Application logic
│   ├── Actions/           # Custom actions
│   ├── Http/Controllers/  # HTTP controllers
│   ├── Livewire/          # Livewire components
│   ├── Models/            # Eloquent models
│   └── Providers/         # Service providers
├── config/                # Configuration files
├── database/              # Migrations and seeders
├── public/                # Public assets
├── resources/             # Views, CSS, JS
│   ├── css/
│   ├── js/
│   └── views/
├── routes/                # Route definitions
├── storage/               # File storage
├── tests/                 # Test files
└── vendor/                # Composer dependencies
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support, email support@motoblog.com or create an issue in this repository.