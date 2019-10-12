
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

    Workouse\PopupPlugin\WorkousePopupPlugin::class => ['all' => true],
];
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
$ bin/console cache:clear
```
