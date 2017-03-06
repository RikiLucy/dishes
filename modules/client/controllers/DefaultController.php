<?php

namespace app\modules\client\controllers;

use yii\web\Controller;

/**
 * Default controller for the `client` module
 */
class DefaultController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
