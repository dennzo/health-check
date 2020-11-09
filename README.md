# Dennzo Monitoring Tools

![GitHub issues](https://img.shields.io/github/issues/dennzo/monitoring-tools?style=flat-square)
![Travis (.com)](https://img.shields.io/travis/com/dennzo/monitoring-tools?style=flat-square)
![GitHub](https://img.shields.io/github/license/dennzo/monitoring-tools?style=flat-square)
![GitHub release (latest by date)](https://img.shields.io/github/v/release/dennzo/monitoring-tools?style=flat-square)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/dennzo/monitoring-tools?style=flat-square)


This package contains a standardized format for easy monitoring checks.

The tools will generate an output in the below format.
```json
{
    "status":"OK",
    "applicationName":"foo-service",
    "version":"1.1",
    "environment":"prod"
}
```

You should set the `status` manually.

The following information will be automatically detected.
- GIT Version
- Development Environment (ex. dev, test, prod)
- Name of the application


The git tag and application name is **ONLY** detected automatically if...
- ...the server has git installed
- ...the application itself is a git repository



## Installation

    composer require dennzo/monitoring-tools

## Usage

Use the Class MonitoringTools to implement this feature in your application.

Depending on your application you will need to create the MonitoringController and define a health_check route.

```php
// Json
MonitoringTools::provideHealthCheckAsJson();

// Object
MonitoringTools::provideHealthCheckAsObject();
```

[You can find some more examples and explanation here.](https://github.com/dennzo/monitoring-tools/wiki)


## Defaults
|Name|Default|Description|
|---|---|---|
|Status|OK|You should override this within your application, for example by testing the apps functionality.|
|Git Version|Automatic mechanism or null|If GIT is installed and the current project is a git repository it will automatically detect this.|
|Environment|Automatic mechanism or null|The environment is read to see if certain variables exist.|
|Application Name|Automatic mechanism or null|If GIT is installed and the current project is a git repository it will automatically detect this.|

