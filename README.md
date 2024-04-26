Sucuri Cache Clear

Purge Sucuri caches from Craft. Please note, this is the same plugin as [Securi Cache Clear](https://plugins.craftcms.com/securi-cache-clear), with the spelling of _Sucuri_ corrected in this version.

## Requirements

This plugin requires Craft CMS 4.x or later, or Craft CMS 5.x or later and PHP 8.0.2 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Sucuri Cache Clear”. Then press “Install”.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project

# tell Composer to load the plugin
composer require swish-digital/craft-sucuri-cache-clear

# tell Craft to install the plugin
./craft plugin/install sucuri-cache-clear
```

## Configuration

Go to your Sucuri dashboard and locate the API section. Find your API Key and API Secret.

It is recommended that you add the key and secret to your .env file as environment variables. However, you may also enter them directly into the plugin settings.

Go to your Craft control panel > Settings > Plugins > Sucuri Cache Clear > Settings

Enter your API Key and API Secret, or choose the environment variables you previously setup, and save the plugin settings.

## Usage

Go to your Craft control panel > Utilities > Sucuri Cache Purge and click the "Purge Sucuri Cache" button. Once complete, the control panel will display a success notification popup.

## Roadmap

1. Add discreet uri cache clearing utility
2. Add cache clearing upon element save (entries, categories, globals, etc.)

## Support

Please [file an issue](https://github.com/helloswish/sucuri-cache-clear/issues) on Github. 