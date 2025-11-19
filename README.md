# A simple way to integrate a filament seo table to your app.

## Compatibilidad

- PHP `^8.2`
- Laravel `^12.0`
- Filament `^4.0`

## Uso con Filament v4 (Panel Plugin)

Registra el plugin en tu Panel para que el recurso "SEO" se añada automáticamente al menú:

```php
use Dovaldev\FilamentSimpleSeo\FilamentSimpleSeoPlugin;

// Dentro de tu builder de Panel
$panel->plugins([
    FilamentSimpleSeoPlugin::make(),
]);
```

Tras registrarlo, verás el grupo de navegación "SEO" con el CRUD listo (listar, crear y editar).


```bash
/** SEO */
Forms\Components\Section::make('SEO')
    ->description('Add the SEO data to your model')
    ->relationship('seo')
    ->collapsed()
    ->collapsible()
    ->schema([
        Forms\Components\TextInput::make('title')
            ->maxLength(255),
        Forms\Components\TextInput::make('description')
            ->maxLength(255),
        Forms\Components\Fieldset::make('Estado')
            ->schema([
                Forms\Components\Toggle::make('index')->default(true),
            Forms\Components\Toggle::make('follow')->default(true),
            Forms\Components\Toggle::make('status')->default(true),
        ])
        ->columns(3),
]),
```




[![Latest Version on Packagist](https://img.shields.io/packagist/v/dovaldev/filament-simple-seo.svg?style=flat-square)](https://packagist.org/packages/dovaldev/filament-simple-seo)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/dovaldev/filament-simple-seo/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/dovaldev/filament-simple-seo/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/dovaldev/filament-simple-seo/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/dovaldev/filament-simple-seo/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dovaldev/filament-simple-seo.svg?style=flat-square)](https://packagist.org/packages/dovaldev/filament-simple-seo)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require dovaldev/filament-simple-seo
```

You can publish and run the migrations with:

```bash
php artisan filament-simple-seo
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-simple-seo-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-simple-seo-views"
```

This is the contents of the published config file:

```php
return [
];
```


## Adding SEO to User Model

To add SEO to the User model, add the following method to the User model:

```php
use Dovaldev\FilamentSimpleSeo\Models\Seo;

/**
 * Get the SEO data for the user.
 */
public function seo() {
    return $this->morphOne(Seo::class, 'seoable');
}
```

## Opcional: Campos SEO en tus formularios

Si además quieres mostrar/editar los campos SEO dentro de tus propios recursos de Filament, puedes añadir una sección como esta a tu `Form`:

```php
/** SEO */
Forms\Components\Section::make('SEO')
    ->description('Add the SEO data to your model')
    ->relationship('seo')
    ->collapsed()
    ->collapsible()
    ->schema([
        Forms\Components\TextInput::make('title')
            ->maxLength(255),
        Forms\Components\TextInput::make('description')
            ->maxLength(255),
        Forms\Components\Fieldset::make('Estado')
            ->schema([
                Forms\Components\Toggle::make('index')->default(true),
                Forms\Components\Toggle::make('follow')->default(true),
                Forms\Components\Toggle::make('status')->default(true),
            ])
            ->columns(3),
    ]);
```

## Nota de migración

- La tabla `seos` ahora incluye clave primaria `id` y columnas polimórficas mediante `morphs('seoable')` para compatibilidad completa con Eloquent y el CRUD.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [J.A. Doval](https://github.com/dovaldev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
