

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/skeleton-nova-nova-model-settings-field.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/skeleton-nova-nova-model-settings-field)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Using this skeleton (remove this section after you have completed these steps)

This repo contains a skeleton to easily create Nova Tool packages. It contains a few niceties not present in the default Nova Tool scaffolding.

First clone this repo to your development machine and remove the `.git` directory. Next run `git init` to create another repo. Create a new repo on GitHub (or another source control saas) and point the origin remote of your cloned repo to the one you just created. Here's an example: `git remote add origin git@github.com:spatie/newly-created-repo.git`. Commit all files and push to master.

Next replace these variables in all files of your repo:
 - `Donatien Schmitz` (example: 'Freek Van der Herten')
 - `Donaschmi` (example: 'freekmurze')
 - `donatien@schmitz.cc` (example: 'freek@spatie.be')
 - `nova-model-settings-field` (example: 'nova-tail-nova-model-settings-field')
 - `A model-settings field for Laravel Nova` (example: 'A nova-model-settings-field to tail the log')
 - `:vendor` (example: 'spatie')
 - `Readanrate` (example: 'Spatie')
 - `:namespace_nova_model_settings_field_name` (example: 'TailTool')
 
 Next run `composer install`, `yarn` and `yarn production`.
 
If you don't have a Nova app already head over the [nova installation instructions](https://nova.laravel.com/docs/1.0/installation.html#installing-nova).

To use your customized package in a Nova app, add this line in the `require` section of the `composer.json` file:
 
 ```
    ":vendor/nova-model-settings-field": "*",
```
 
 In the same `composer.json` file add a `repositiories` section with the path to your package repo:
 
 ```
     "repositories": [
         {
             "type": "path",
             "url": "../nova-model-settings-field"
         },
```
 
Now you're ready to develop your package inside a Nova app.
 
**When you are done with the steps above delete everything above!**

# A model-settings field for Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor/nova-model-settings-field.svg?style=flat-square)](https://packagist.org/packages/:vendor/nova-model-settings-field)
![CircleCI branch](https://img.shields.io/circleci/project/github/:vendor/nova-model-settings-field/master.svg?style=flat-square)
[![Build Status](https://img.shields.io/travis/:vendor/nova-model-settings-field/master.svg?style=flat-square)](https://travis-ci.org/:vendor/nova-model-settings-field)
[![Quality Score](https://img.shields.io/scrutinizer/g/:vendor/nova-model-settings-field.svg?style=flat-square)](https://scrutinizer-ci.com/g/:vendor/nova-model-settings-field)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor/nova-model-settings-field.svg?style=flat-square)](https://packagist.org/packages/:vendor/nova-model-settings-field)


This is where your description should go. Try and limit it to a paragraph or two.

Add a screenshot of the nova-model-settings-field here.

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require :vendor/nova-model-settings-field
```

Next up, you must register the nova-model-settings-field with Nova. This is typically done in the `nova-model-settings-fields` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function nova-model-settings-fields()
{
    return [
        // ...
        new \Readanrate\:namespace_nova_model_settings_field_name\Tool(),
    ];
}
```

## Usage

Click on the "nova-model-settings-field" menu item in your Nova app to see the nova-model-settings-field provided by this package.

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email donatien@schmitz.cc instead of using the issue tracker.

## Postcardware

You're free to use this package, but if it makes it to your production environment we highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: Spatie, Kruikstraat 22, 2018 Antwerp, Belgium.

We publish all received postcards [on our company website](https://spatie.be/en/opensource/postcards).

## Credits

- [Donatien Schmitz](https://github.com/Donaschmi)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
