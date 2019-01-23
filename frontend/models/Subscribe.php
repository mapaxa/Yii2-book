<?php

namespace frontend\models;

use yii\base\Model;
use Yii;

/**
 * Description of Subscribe
 *
 * @author anty
 */
class Subscribe extends Model {

 public $email;
 public $birth_date;
 public $start_date;
 public $city;
 public $identification_number;


 public function rules() 
  {
    return [
        [['email'], 'required'],
        [['email'], 'email'],
        
    ];
  }
  
  public function save()
  {
   $sql ='INSERT INTO subscriber (id, email) VALUES (null, \'' . $this->email . '\')' ;
   $result = Yii::$app->db->createCommand($sql)->execute();
   return $result; 
  }

}
