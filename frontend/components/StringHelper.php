<?php

namespace frontend\components;

use Yii;
/**
 * Description of StringHelper
 *
 * @author anty
 */
class StringHelper {
  private $limit = 3;
  
  public function __construct()
  {
    $this->limit = Yii::$app->params['shortTextLimit'];
  }
  public function getShort($string, $limit = null)
  { 
    if($limit === null){
      $limit = $this->limit;
    }
    return substr($string, 0, $limit);
  }
  
}
