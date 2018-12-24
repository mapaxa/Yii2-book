<?php
namespace console\models;

use Yii;



/**
 * Description of News
 *
 * @author anty
 */
class News 
{
  const STATUS_NOT_SEND = 1;
  const STATUS_SENT = 2;
  
  public static function getList()
  {
    $sql = 'SELECT * FROM news WHERE status = ' . self::STATUS_NOT_SEND;
    $result = Yii::$app->db->createCommand($sql)->queryAll();
    return self::prepareList($result);
  }
  public static function prepareList($result)
  {
    if(!empty($result) && is_array($result)) {     
      foreach ($result as $key=> $value) {
        $result[$key]['content'] = Yii::$app->stringHelper->getShort($value['content']);
      }
    }
    return $result;
  }
  
  
  public static function newsSetStatusSent($newsArr)
  {
    $newsList = self::getList();
    foreach($newsList  as $singleNews) {
      
      $singleNewsId = intval($singleNews['id']);
      $singleNewsStatus = intval($singleNews['status']);
      
      if($singleNewsStatus == 1) {
        $sql = 'UPDATE news SET status = ' . self::STATUS_SENT . ' WHERE id=' . $singleNewsId ;
        $result = Yii::$app->db->createCommand($sql)->execute();
      }
      
      var_dump($singleNewsStatus);
      echo '<br>';
    }
  }
}
