<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test;

class TestController extends Controller {

  public function actionIndex() {
    
    $max = Yii::$app->params['maxNewsInList'];
    $list = Test::getNewslist($max);
    //print_r($list);
    return $this->render('index', ['list' => $list,]);
  }

}
