# .env Variables Generator

## Overview

This package provides a console tool designed to facilitate the quick generation of essential environment variables needed in application configurations. Instead of manually crafting and editing `.env` files, this script automates the process, presenting ready-to-use values directly in the console output, which can then be manually inserted into your application's `.env` file.

## Requirements

- PHP 7.4 or higher
- Composer
- Symfony Console component

## Installation

To install the package in your project, use Composer by running the following command:

```bash
composer require hubertkoy/env-generator
```

## Configuration

To enable the GenerateEnvCommand in your Symfony application, add the following configuration to your config/services.yaml file:

```yaml
services:
    HubertKoy\EnvGenerator\Command\GenerateEnvCommand:
        tags:
            - { name: 'console.command' }
```

Ensure that all dependencies mentioned in the "Requirements" section are met.

## Usage

After successful installation, the command can be executed in the terminal as follows:

```bash
php bin/console generate:env
```

Follow the on-screen prompts to generate the required environment variables. The results will be displayed on the console, ready to be copied into your application's `.env` file.

## Features

- Generate secure random values for APP_SECRET
- Create environment-specific values for APP_ENV
- Quick generation of encryption keys and initialization vectors

## Support and Contributions

Issues, questions, and feature requests are welcome through the "Issues" section of this repository. Contributions can be made via "Pull Requests." Please ensure to follow the guidelines laid out in the CONTRIBUTING.md (if available).

## License

This package is licensed under the MIT License.