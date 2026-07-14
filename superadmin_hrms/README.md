# GIC ERP HRMS

This directory contains the active CodeIgniter 4 HRMS application for the Transportation ERP repository.

It includes company-scoped staff management, a four-phase recruitment workflow, attendance, performance reviews, chat, profile management, and encrypted company email settings.

## Quick start

```bash
composer install
php spark key:generate
php spark migrate
php spark serve --host 127.0.0.1 --port 8080
```

Configure the application URL and MySQL connection in `.env` before running migrations.

```dotenv
CI_ENVIRONMENT = development
app.baseURL = 'http://127.0.0.1:8080/'

database.default.hostname = localhost
database.default.database = hrms
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Run tests with:

```bash
composer test
```

See the [repository README](../README.md) for features, roles, architecture, detailed installation steps, security guidance, and testing notes.
