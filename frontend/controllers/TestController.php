<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test;

class TestController extends Controller {
  
  /**
   * 
   * @return array
   * 
   * 
   */
  public function actionIndex() {
    $max = Yii::$app->params['maxNewsInList'];
    $list = Test::getNewslist($max);
    //print_r($list);
    return $this->render('index', ['list' => $list]);
  }
  
  public function actionView($id)
  { 
    
    $item = Test::getItem($id);
    //var_dump($item); die();
    return $this->render('view',
            ['item' => $item]
    );
  }
  
  
  /**
   * 
   * @return integer
   */
  public function actionCount()
  {
    $count = Test::getNewsCount();
   
    return $this->render('count', ['count' => $count]);
  }
  
  
  public function actionMail()
  {
    $result = Yii::$app->mailer->compose()
            ->setFrom('mapaxa88@gmail.com')
            ->setTo('mapaxa88@gmail.com')
            ->setSubject('Тема сообщения')
            ->setTextBody('Текст сообщения')
            ->setHtmlBody('<b>Текст в формате HTML</b>')
            ->send();
    var_dump($result);
  }

}
