# Activity Log

A Laravel package for logging activity within your application.

## Installation

```bash
composer require jameskaydev/activity-log
```

## Usage

To use this package, include the `LogsActivity` trait in any Eloquent model you wish to track.

```php
use jameskaydev\ActivityLog\Traits\LogsActivity;

class YourModel extends Model
{
    use LogsActivity;
}
```

This will automatically log `created`, `updated`, and `deleted` events for the model.

## Configuration

You can publish the configuration file using the following command:

```bash
php artisan vendor:publish --provider="jameskaydev\ActivityLog\ActivityLogServiceProvider" --tag="config"
```

## Migrations

Run the following command to create the necessary table:

```bash
php artisan migrate
```
