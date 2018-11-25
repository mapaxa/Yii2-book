<?php

namespace frontend\models;
use Yii;
//use frontend\components\StringHelper;//вот так мы раньше подключали
 
class Test {
  public static function getNewsList($max) 
  {  
    $max = intval($max);
    $sql = 'SELECT * FROM news LIMIT ' . $max;
    $result = Yii::$app->db->createCommand($sql)->queryAll();
      
//    $helper = new StringHelper(); // и вот так создавался экземпляр класса
    $helper = Yii::$app->stringHelper; // а вот так сейчас после того как прописалим в main.php в параметры вызов метода
                                       // и можно переменную $helper теперь впихнуть в 20 строку
     
    if(!empty($result) && is_array($result)) {     
      foreach ($result as &$value) {
        $value['content'] = $helper->getShort($value['content']);
      }
    }
    return $result; 
  }
}