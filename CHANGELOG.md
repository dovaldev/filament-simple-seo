# Changelog

All notable changes to this project will be documented in this file.

## v2.0.0 – 2025-11-19

- Support Laravel 12 and Filament v4
- Require PHP `^8.2`
- Add Filament panel plugin integration and auto-registration of `SeoResource`
- Migration stub updated: add primary key `id` and use `morphs('seoable')`
- Config file standardized to `config/filament-simple-seo.php`

Breaking changes:
- Drops compatibility with Filament v3
- Requires PHP 8.2+

Upgrade notes:
- Update your app to use `FilamentSimpleSeoPlugin::make()` in the Panel builder
- Run `php artisan filament-simple-seo` and then `php artisan migrate`
- Existing `seos` tables continue working; adopting the new `id` column is optional and can be done with a custom migration if needed

## v1.x – Filament v3 line

- Compatible with Filament v3
- No changes required for existing installs; continue using the v1.x line if you remain on Filament v3