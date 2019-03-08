<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Employee;
use frontend\models\example\Human;

/**
 * Description of EmployeeController
 *
 * @author anty
 */
class EmployeeController extends Controller
{

  public function actionIndex()
  {
    $employee1 = new Employee();

    $employee1->firstName = 'Alex';
    $employee1->lasttName = 'Smith';
    $employee1->middleName = 'John';
    $employee1->salary = 1000;

    echo $employee1->salary;
  }

  public function actionTest()
  {
    $human = new Human();
    $human->walk();
  }

  public function actionRegister()
  {
    $model = new Employee;
    $model->scenario = Employee::SCENARIO_EMPLOYEE_REGISTER;
    
    if ($model->load(Yii::$app->request->post())) { // загружаем данные в модель чтобы не перебирать все поля есть метод load
      if ($model->validate() && $model->save()) {
        Yii::$app->session->setFlash('success', 'Register completed');
      }
    }
    return $this->render('register', [
                'model' => $model,
    ]);
  }

  public function actionUpdate()
  {
    $model = new Employee;
    $model->scenario = Employee::SCENARIO_EMPLOYEE_UPDATE;
    $formData = Yii::$app->request->post();
    if (Yii::$app->request->isPost) {
      echo '<pre>';
      echo '<H1>formData</h1>';
      print_r($formData);
      echo '</pre>';
      $model->attributes = $formData; // загружаем данные в модель чтобы не перебирать все поля есть свойство attributes

      if ($model->validate() && $model->save()) {
        Yii::$app->session->setFlash('success', 'Update completed');
      }
    }
    return $this->render('update', [
                'model' => $model,
    ]);
  }

}
