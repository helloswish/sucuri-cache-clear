<?php

namespace helloswish\craftsucuricacheclear;

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Utilities;
use helloswish\craftsucuricacheclear\models\Settings;
use helloswish\craftsucuricacheclear\services\Api;
use helloswish\craftsucuricacheclear\utilities\Purge;
use yii\base\Event;

/**
 * Sucuri Cache Clear plugin
 *
 * @method static Sucuri getInstance()
 * @method Settings getSettings()
 * @author Swish Digital <support@swishdigital.co>
 * @copyright Swish Digital
 * @license MIT
 * @property-read Api $api
 */
class Sucuri extends Plugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => ['api' => Api::class],
        ];
    }

    public function init(): void
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('sucuri-cache-clear/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)

        // The name of the event appears to have changed in Craft 5
        // Craft 5 = EVENT_REGISTER_UTILITIES
        // Older Craft versions = EVENT_REGISTER_UTILITY_TYPES
        $craftVersion = Craft::$app->version;

        if($craftVersion[0] === '5') {
            Event::on(Utilities::class, Utilities::EVENT_REGISTER_UTILITIES, function (RegisterComponentTypesEvent $event) {
                $event->types[] = Purge::class;
            });
        } else {
            Event::on(Utilities::class, Utilities::EVENT_REGISTER_UTILITY_TYPES, function (RegisterComponentTypesEvent $event) {
                $event->types[] = Purge::class;
            });
        }

    }
}
