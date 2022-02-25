# An unopinionated multitenancy package for Laravel | Lumen apps

[![Latest Version on Packagist](https://img.shields.io/packagist/v/theriddleofenigma/laravel-multitenancy.svg?style=flat-square)](https://packagist.org/packages/theriddleofenigma/laravel-multitenancy)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/theriddleofenigma/laravel-multitenancy/run-tests?label=tests)](https://github.com/theriddleofenigma/laravel-multitenancy/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/theriddleofenigma/laravel-multitenancy.svg?style=flat-square)](https://packagist.org/packages/theriddleofenigma/laravel-multitenancy)

This package is a cloned version of [spatie/laravel-multitenancy](https://github.com/spatie/laravel-multitenancy) in order to make a Laravel | Lumen app tenant aware. Since `spatie/laravel-multitenancy` doesn't support for the Lumen applications. The philosophy of this package is that it should only provide the bare essentials to enable multitenancy.

The package can determine which tenant should be the current tenant for the request. It also allows you to define what should happen when switching the current tenant to another one. It works for multitenancy projects that need to use one or multiple databases.

Before starting with the package, we highly recommend first watching [this talk by Tom Schlick on multitenancy strategies](https://tomschlick.com/laracon-2017-multi-tenancy-talk/).

The package contains a lot of niceties such as making queued jobs tenant aware, making an artisan command run for each tenant, an easy way to set a connection on a model, and much more.

## Documentation

You can find the entire documentation for the `spatie/laravel-multitenancy` package [on our documentation site](https://docs.spatie.be/laravel-multitenancy). As this package is an exact clone and in addition brings support to Lumen framework.

## Testing

You'll need to create the following 3 local MySql databases to be able to run the test suite:

- `laravel_mt_landlord`
- `laravel_mt_tenant_1` 
- `laravel_mt_tenant_2`

You can run the package's tests:

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

The code of this package is based on the code shown in [the Multitenancy in Laravel series](https://www.youtube.com/watch?v=592EgykFOz4)  by Mohamed Said

- [Kumaravel](https://github.com/theriddleofenigma)
- [Spatie](https://github.com/spatie)
- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## Alternatives

- [tenancy/tenancy](https://tenancy.dev)
- [stancl/tenancy](https://tenancyforlaravel.com)
- [gecche/laravel-multidomain](https://github.com/gecche/laravel-multidomain)
- [romegadigital/multitenancy](https://github.com/romegasoftware/multitenancy)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
