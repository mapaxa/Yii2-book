<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Description of Employee
 *
 * @author anty
 */
class Employee extends Model
{

  const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
  const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

  public $firstName;
  public $lastName;
  public $middleName;
  public $salary;
  public $email;
  public $start_date;
  public $birth_date;
  public $experience;
  public $profession = 'teacher';
  public $department_number = 3;
  public $identification_number;
  public $city;

  public function calculateExperience()
  {
    return $this->start_date;
  }

  public function scenarios()
  {
    return [
        self::SCENARIO_EMPLOYEE_REGISTER => ['firstName', 'lastName', 'middleName', 'email', 'start_date', 'identification_number'],
        self::SCENARIO_EMPLOYEE_UPDATE => ['firstName', 'lastName', 'middleName'],
    ];
  }

  public function rules()
  {
    return [
        [['firstName', 'lastName', 'email', 'start_date', 'identification_number'], 'required'],
        [['firstName'], 'string', 'min' => 2],
        [['lastName'], 'string', 'min' => 3],
        [['email'], 'email'],
        [['middleName'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE], // пример для того , если правило валидации надо выполнять только в каком-то определённом сценарии
        [['birth_date'], 'date', 'format' => 'php:Y-m-d'],
        [['start_date'], 'date', 'format' => 'php:Y-m-d'],
        [['profession'], 'string'],
        [['city'], 'integer'],
        ['identification_number', 'string', 'length' => [10]],
        [['start_date', 'profession', 'identification_number'], 'required', 'on' => self::SCENARIO_EMPLOYEE_REGISTER,],
    ];
  }

  public function save()
  {

    if (Yii::$app->request->pathInfo == 'employee/update') {
      echo Yii::$app->request->pathInfo;

      echo 'нужно это будет дописать. В уроках не было задания';
      return true;
      //$sql = "UPDATE employee SET first_name='$this->firstName' , last_name = '$this->lastName' WHERE ";
    } else if (Yii::$app->request->pathInfo == 'employee/register') {
      $sql = "INSERT INTO employee (id, first_name, last_name, start_date, experience, profession, department_number, identification_number) VALUES (null, '$this->firstName', '$this->lastName', '$this->start_date', '1', '$this->profession', $this->department_number, $this->identification_number)";
    }

    $result = Yii::$app->db->createCommand($sql)->execute();
    return $result;
  }

  
  public function getCitiesList()
  {
    $sql = 'SELECT * from cities';
    $result = Yii::$app->db->createCommand($sql)->queryAll();
    return ArrayHelper::map($result, 'id', 'name');
  }

}
