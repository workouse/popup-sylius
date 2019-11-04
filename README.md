
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/workouse/popup-sylius/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/workouse/popup-sylius/?branch=master) 
[![Build Status](https://scrutinizer-ci.com/g/workouse/popup-sylius/badges/build.png?b=master)](https://scrutinizer-ci.com/g/workouse/popup-sylius/build-status/master)

## popup-sylius
Popup Bundle for Sylius E-Commerce. Allows you to create simple popups.


## Installation
```bash
$ composer require workouse/popup-sylius
```

Add plugin dependencies to your `config/bundles.php` file:
```php
return [
    ...

    FOS\CKEditorBundle\FOSCKEditorBundle::class => ['all' => true], // WYSIWYG editor
    Workouse\PopupPlugin\WorkousePopupPlugin::class => ['all' => true],
];
```

The first line above (FOSCKEditorBundle) might have been already added during composer require command.

Install WYSIWYG editor ([FOS CKEditor](https://symfony.com/doc/master/bundles/FOSCKEditorBundle/usage/ckeditor.html))

```bash
$ bin/console ckeditor:install
```

Import required config in your `config/packages/_sylius.yaml` file:

```yaml
# config/packages/_sylius.yaml

imports:
    ...
    
    - { resource: "@WorkousePopupPlugin/Resources/config/config.yml" }
```

Import routing in your `config/routes.yaml` file:

```yaml

# config/routes.yaml
...

workouse_popup_plugin:
    resource: "@WorkousePopupPlugin/Resources/config/routing.yml"
```

Finish the installation by updating the database schema and installing assets:
```
$ bin/console doctrine:migrations:diff
$ bin/console doctrine:migrations:migrate
$ bin/console assets:install --symlink
$ bin/console sylius:theme:assets:install --symlink
$ bin/console cache:clear
```

## Testing & running the plugin
```bash
$ composer install
$ cd tests/Application
$ yarn
$ yarn build
$ bin/console assets:install public -e test
$ bin/console doctrine:database:create -e test
$ bin/console doctrine:schema:create -e test
$ bin/console server:run 127.0.0.1:8080 -d public -e test
$ open http://localhost:8080
$ vendor/bin/behat
```
