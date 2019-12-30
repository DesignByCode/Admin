# Admin panel for laravel application

```php
$ composer require designbycode/admin
```

## change config auth.php 


```php
//Change 
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => DesignByCode\Admin\Models\User::class,
        ],
```

vendor publish all packages


```php 
// Implicitly grant "Super Admin" role all permissions
// This works in the app by using gate-related functions like auth()->user->can() and @can()
Gate::before(function ($user, $ability) {
    return $user->hasRole('Super Admin') ? true : null;
});
```

add middleware 

```php 
protected $routeMiddleware = [
    // ...
    'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
    'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
    'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
];
```

Add to User model this to trait and import namesapce 

```php
use Notifiable, HasRoles, UserType;
```

genarate 2 roles 

```
php artisan permission:create-role "Super Admin"
php artisan permission:create-role "Admin"
```
