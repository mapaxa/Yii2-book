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
  /**
   * 
   * @param type $string
   * @param type $limit
   * @return string
   */
  public function getShort($string, $limit = null) :string
  { 
    if($limit === null){
      $limit = $this->limit;
    }
    return substr($string, 0, $limit);
  }
  /**
   * 
   * @param type $string
   * @param type $limit
   * @return string
   */
  function getShortFullWord($string, $limit = 35) :string
  {   
    $separator = ' ';

    if($string{$limit} == ' '){
      return substr($string, 0, $limit); //если заканчивается правильно, то ф-ция так и возвращает
    }
    elseif($limit <= strlen($string)) { // если позиция поиска меньше, чем длина строки, в которой искать 

      $cutted_string = substr($string, 0, $limit);

      for($i = $limit; $i <= strlen($string) - 1; $i++) {
        if($string{$i} != $separator) {
          $cutted_string .= $string{$i};
        }
        else {
          break;
        }
      }
      return $cutted_string;
    }
  }
  /**
   * 
   * @param type $string
   * @param type $limit
   * @return string
   */
  function getShortWordCount($string, $limit = 5) :string
  {   
    $str_to_arr = explode(' ', $string);
    $cutted_string = '';
    for($i = 0; $i < $limit; $i++ ){
        $cutted_string .= $str_to_arr[$i] . ' ';
    }
    return $cutted_string;
  }
  
}
