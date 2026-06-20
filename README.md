# ITAM Portal

A professional PHP 8 and MySQL foundation for an IT Asset & Endpoint Management Portal. The portal is designed to centralize hardware assets, endpoint inventory, software inventory, license positions, contracts, copier machine agreements, network line contracts, reporting, administration, and future PDQ Connect integration.

## Technology Stack

- PHP 8
- MySQL / MariaDB
- HTML5
- CSS3
- JavaScript

## Project Structure

```text
/assets/css          Enterprise UI stylesheet
/assets/js           Front-end interaction helpers
/assets/images       Static image assets
/config              Environment and database configuration
/database            MySQL schema and seed examples
/pages               Sample repository pages with dummy data
/modules             Shared data modules and future integrations
/modules/api/pdq     Placeholder structure for PDQ Connect integration
```

## Dashboard Foundation

The executive dashboard includes cards for Total Assets, Online Endpoints, Software Licenses, Active Contracts, Expiring Contracts, and Monthly IT Cost. It also includes sections for contract expiration, warranty expiration, endpoint health, asset distribution by combined location, and software compliance.

## Location Format

Locations support a combined enterprise-friendly display format, for example:

- `Yard 1 - Main Office Level 2 (PIC)`
- `Yard 2 - New Building Level 1 (PIC)`

The database stores location components separately and generates a display name for consistent reporting.

## Database Setup

1. Create a database user for the application.
2. Update `config/database.php` or set the matching environment variables.
3. Import the schema:

```bash
mysql -u <user> -p < database/schema.sql
```

## Running Locally

```bash
php -S localhost:8000
```

Open <http://localhost:8000> to view the dashboard.

## Future PDQ Connect Integration

`modules/api/pdq_connect.php` defines the integration boundary for a future PDQ Connect client. The placeholder is ready to be expanded to synchronize endpoint inventory, deployment status, patch state, and device health.
