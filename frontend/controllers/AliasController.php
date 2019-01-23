<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
/**
 * Description of AliasController
 *
 * @author anty
 */
class AliasController extends Controller {
  
  
  public function actionExample() 
  {
    $result = mkdir(Yii::getAlias('@files').'/test5');
    
    var_dump($result);
  }
  
  
  
}
