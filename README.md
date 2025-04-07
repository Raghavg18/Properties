# Property Matcher

A Laravel-based web application that helps match properties with potential buyers or renters based on their preferences and requirements.

## Features

- Property listing and management
- User preference matching
- Advanced search and filtering
- User authentication and authorization
- Responsive web interface

## Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- Laravel 10.x

## Installation

1. Clone the repository:
```bash
git clone https://github.com/Raghavg18/Properties.git
cd property-matcher
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in the `.env` file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=property_matcher
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations:
```bash
php artisan migrate
```

8. Start the development server:
```bash
php artisan serve
```

9. In a separate terminal, start the Vite development server:
```bash
npm run dev
```

## Testing

Run the test suite:
```bash
php artisan test
```

## Project Structure

- `app/` - Contains the core code of the application
- `config/` - Configuration files
- `database/` - Database migrations and seeders
- `resources/` - Views, raw assets, and language files
- `routes/` - Application routes
- `tests/` - Test files
- `vendor/` - Composer dependencies

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please open an issue in the repository or contact the development team.
