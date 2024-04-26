<?php

namespace helloswish\craftsucuricacheclear\controllers;

use Craft;
use craft\helpers\UrlHelper;
use craft\web\Controller;
use helloswish\craftsucuricacheclear\Sucuri;
use yii\web\Response;

/**
 * Purge controller
 */
class PurgeController extends Controller
{
    public $defaultAction = 'index';
    protected array|int|bool $allowAnonymous = self::ALLOW_ANONYMOUS_NEVER;

    /**
     * Purges entire Cloudflare zone cache.
     * @return Response
     */
    public function actionPurgeAll()
    {

        $result = Sucuri::getInstance()->api->purgeEntireCache();

        $url = UrlHelper::urlWithParams('utilities/sucuri-purge', [
            'type' => 'purgeEntireCache',
            'status' => $result->status
        ]);

        Craft::$app->getSession()->setSuccess($result->messages[0]);

        return $this->redirect($url);

    }
}
