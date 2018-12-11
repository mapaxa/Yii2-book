<?php

namespace console\controllers;

use Yii;
/**
 * Description of Mailer
 *
 * @author anty
 */
class MailerController extends \yii\console\Controller {
  
  public function actionSend()
  {
    $result = Yii::$app->mailer->compose()
      ->setFrom('mapaxa88@gmail.com')
      ->setTo('mapaxa88@gmail.com')
      ->setSubject('Тема сообщения')
      ->setTextBody('Текст сообщения')
      ->setHtmlBody('<b>Текст в формате HTML</b>')
      ->send();
    
var_dump($result); die;
  }
  
}



