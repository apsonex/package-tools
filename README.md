# Package Development Tools

## HasServiceProvidersUtilities

```php
/**
* Credit goes to
* https://darkghosthunter.medium.com/laravel-packages-load-or-publish-migrations-119db770c870 
*/
public function boot() {
    $this->registerMigrations(__DIR__ . '/../database/migrations');
}
```