# Console Availability Bundle

This bundle provides a console command availability in a development environment and is useful when you want to develop a command just for the dev or prod environment.

### Installation
The recommended way to install the bundle is through Composer:  
```
$ composer require emag-tech-labs/console-availability-bundle
```
### Configuration
```yaml
# config/services.yaml
services:
    # ...

    App\Command\SunshineCommand:
        tags:
            - { name: 'console.command.availability', env: 'dev' }
```
If you want to verify your command availability, please run the following list command:

```bash
# your command is listed in your console
$ bin/console list --env=dev

# your command is not listed in your console
$ bin/console list --env=prod
```

### Submitting bugs and feature requests
If you found a nasty bug or want to propose a new feature, you're welcome to open an issue or create a pull request [here](https://github.com/eMAGTechLabs/console-availability-bundle/issues).