<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Subscribe;

/**
 * Description of NewsletterController
 *
 * @author anty
 */
class NewsletterController extends Controller {

  public function actionSubscribe() {
    $formData = Yii::$app->request->post();
    
    $model = new Subscribe();
    
    if (Yii::$app->request->isPost) {
      
      $model->email = $formData['email'];
//      $model->birth_date = $formData['birth_date'];
//      $model->start_date = $formData['start_date'];
//      $model->city = $formData['city'];
//      $model->identification_number = $formData['identification_number'];
      
      if ( $model->validate() && $model->save() ) {
        
        Yii::$app->session->setFlash('success', 'Subscribe completed!!!');
      }
      
      
    }
    return $this->render('subscribe', [
        'model' => $model,
    ]);
  }

}
