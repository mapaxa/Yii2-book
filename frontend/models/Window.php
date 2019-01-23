<?php

namespace frontend\models;
use yii\base\Model;
use yii\helpers\Url;
use Yii;

/**
 * Description of Window
 *
 * @author anty
 */
class Window extends Model {
  public $width;
  public $height;
  public $cameraCount;
  public $quantityLeaf;
  public $quantityLeafRotation;
  public $color;
  public $windowsill;
  public $email;
  public $name;
  
  public function rules()
  {
    return [
      [['width', 'height', 'cameraCount', 'quantityLeaf', 'quantityLeafRotation', 'color', 'windowsill', 'email', 'name'], 'required'],
      [['width'], 'double', 'min'=>70, 'max'=>210],  
      [['height'], 'double', 'min'=>100, 'max'=>200],  
      [['cameraCount'], 'integer', 'min'=>1],  
      [['quantityLeaf'], 'integer', 'min'=>1],
      [['quantityLeafRotation'], 'integer', 'min'=>1],
      [['email'], 'email'], 
      [['name'], 'string'],
      ];
  }
  
  
  public function save() {
    return true;
  }
  
  
  
  
  
}
