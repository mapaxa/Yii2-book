<?php 
/*@var $model \frontend\models\Subscribe */

if(Yii::$app->session->hasFlash('success')) {
  
//  echo '<pre>';
//  echo 'xxxx';
//  echo '<pre>';
  
  echo Yii::$app->session->getFlash('success');
}

if($model->hasErrors()) {
  echo '<pre>';
  print_r($model->getErrors());
  echo '</pre>';
}

?>
<form method="post">
    <p>Email:</p>
    <label for="email">email</label>
    <input type="text" name="email" />
    <br>
    <br>
<!--    <label for="birth_date">Дата рождения</label>
    <input type="date" name="birth_date" />
    <br>
    <br>
    <label for="start_date">Дата начала работы</label>
    <input type="date" name="start_date" />
    <br>
    <label for="city">Город</label>
    <select name="city">
        <option value="1">Луганск</option>
        <option value="2">Одесса</option>
        <option value="3">Копай</option>
    </select>
    <br>
    <label for="identification_number">идентификационный номер</label>
    <input type="text" name="identification_number" />
    <br>
    <br>-->
    <input type="submit" />
    
    
</form>

