<?php

namespace console\models;
use Yii;
/**
 * Description of Subscriber
 *
 * @author anty
 */
class Subscriber {
  
  
  public static function getList()
  {
    $sql = 'SELECT * FROM subscriber';
    $result = Yii::$app->db->createCommand($sql)->queryAll();
    return $result;
  }
}
