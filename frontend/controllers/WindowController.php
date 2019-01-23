<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Window;

/**
 * Description of WindowController
 *
 * @author anty
 */
class WindowController extends Controller {

  public function actionOrder() {

    $model = new Window;

    $formData = Yii::$app->request->post();

    if (Yii::$app->request->isPost) {
      $model->attributes = $formData;

      if ($model->validate() && $model->save()) {
        Yii::$app->session->setFlash('success', 'window order completed');
        return $this->render('mail', [
                'model' => $model,
    ]); 
      }
      else if(!$model->validate()) {
        Yii::$app->session->setFlash('error', 'validation error');
        
      }
    }
    echo $model->color;
    return $this->render('order', [
                'model' => $model,
    ]);
  }
  
  
  public function actionMail()
  {
    
    $model = new Window;
    
//    $result = Yii::$app->mailer->compose()
//            ->setFrom('mapaxa88@gmail.com')
//            ->setTo('mapaxa88@gmail.com')
//            ->setSubject('Тема сообщения')
//            ->setTextBody('Текст сообщения')
//            ->setHtmlBody('<b>Текст в формате HTML</b>')
//            ->send();
    
    
    return $this->render('mail', [
                'model' => $model,
    ]);
  }

}
