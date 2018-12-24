<?php

namespace console\controllers;

use Yii;

use console\models\News;
use console\models\Subscriber;
use console\models\Sender;
/**
 * Description of Mailer
 *
 * @author anty
 */
class MailerController extends \yii\console\Controller {
  
  public function actionSend()
  {
    $newsList = News::getList();
    $subscribers = Subscriber::getList();
    $send = Sender::run($subscribers, $newsList);
    
    if($send){
      News::newsSetStatusSent($newsList);
    
    }
  }
  
}



