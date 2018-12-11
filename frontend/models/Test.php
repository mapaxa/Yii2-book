<?php

namespace frontend\models;
use Yii;
//use frontend\components\StringHelper;//вот так мы раньше подключали
 
class Test {
  
  /**
   * 
   * @param integer
   * @return array
   */
  public static function getNewsList($max) 
  {  
    $max = intval($max);
    $sql = 'SELECT * FROM news LIMIT ' . $max;
    $result = Yii::$app->db->createCommand($sql)->queryAll();
      
//    $helper = new StringHelper(); // и вот так создавался экземпляр класса
    $helper = Yii::$app->stringHelper; // а вот так сейчас после того как прописалим в main.php в параметры вызов метода
                                       // и можно переменную $helper теперь впихнуть в 20 строку
    
    if(!empty($result) && is_array($result)) {     
      foreach ($result as $key=> $value) {
        $result[$key]['content'] = $helper->getShort($value['content']);
      }
    }
    return $result;
  }
  /**
   * 
   * @param type $id
   * @return array|false
   */
  public static function getItem($id)
  { $id = intval($id);
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = Yii::$app->db->createCommand($sql)->queryOne();
    return $result;
  }

  /**
   * 
   * @return array
   */
  public static function getNewsCount()
  {
    $sql = 'SELECT COUNT(id) as NumberOfIds FROM news';
    $result = Yii::$app->db->createCommand($sql)->queryOne();
    return $result;
  }
  
}