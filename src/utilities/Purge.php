<?php

namespace helloswish\craftsucuricacheclear\utilities;

use Craft;
use craft\base\Utility;

/**
 * Purge utility
 */
class Purge extends Utility
{
    public static function displayName(): string
    {
        return Craft::t('sucuri-cache-clear', 'Sucuri Cache Purge');
    }

    static function id(): string
    {
        return 'sucuri-purge';
    }

    public static function iconPath(): ?string
    {
        return Craft::getAlias("@helloswish/craftsucuricacheclear/resources/images/logo.svg");
    }

    static function contentHtml(): string
    {
        return Craft::$app->getView()->renderTemplate('sucuri-cache-clear/_utility.twig');
    }
}
