# GICHRMS

This directory contains the active CodeIgniter 4 application for GICHRMS.

It includes company-scoped staff management, a four-phase recruitment workflow, attendance, performance reviews, chat, profile management, and encrypted company email settings.

## Quick start

```bash
composer install
cp env .env
# Windows PowerShell: Copy-Item env .env
# Edit .env and create the configured MySQL database before continuing.
php check-requirements.php
php spark key:generate
php spark migrate --all
php spark serve
```

Configure the application URL and MySQL connection in `.env` before running migrations.

The configured MySQL account must be able to create databases. GICHRMS keeps the central company directory in the configured database and automatically provisions a separate database for every newly registered company.

```dotenv
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = hrms
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Recommended MySQL setup (replace the password before running):

```sql
CREATE DATABASE hrms CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'gichrms'@'localhost' IDENTIFIED BY 'replace-with-a-strong-password';
GRANT ALL PRIVILEGES ON *.* TO 'gichrms'@'localhost';
FLUSH PRIVILEGES;
```

For production, the provisioning account should be separated from the runtime tenant account. The current local/trial setup uses one account so company registration can create its database automatically.

Run tests with:

```bash
composer test
```

See the [repository README](../README.md) for features, roles, architecture, detailed installation steps, security guidance, and testing notes.
