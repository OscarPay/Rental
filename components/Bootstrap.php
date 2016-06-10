<?php
namespace app\components;
use yii\base\BootstrapInterface;

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/06/2016
 * Time: 10:06 AM
 */
class Bootstrap implements BootstrapInterface{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param \yii\base\Application $app the application currently running
     */
    public function bootstrap($app) {
        // Here you can refer to Application object through $app variable
        $app->params['uploadPath'] = $app->basePath . '/web/uploads/';
        $app->params['uploadUrl'] = $app->urlManager->baseUrl . '/uploads/';
    }

}