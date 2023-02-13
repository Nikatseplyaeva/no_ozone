<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public function beforeAction($action) {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->role != 1) {
            $this->redirect(['/site/login']);
            return false;
        }

        if (!parent::beforeAction($action)) {
            return false;
        }
        return true;
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
