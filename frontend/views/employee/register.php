<?php 

/*var $model frontend\models\Employee*/
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

<h1>welcome to our company</h1>

<form method="post">
    <p>First Name</p>
    <input value="sdsfsds" name="firstName" type="text" />
    <br>
    <br>
    <p>Last Name</p>
    <input value="sdsfsds" name="lastName" type="text">
    <br>
    <br>
    <p>Middle Name</p>
    <input value="sdsfsds" name="middleName" type="text">
    <br>
    <br>
    <p>Email name</p>
    <input value="ewewe@i.ua" name="email"  type="text">
    <br>
    <br>
    <label for="birth_date">Дата рождения</label>
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
    <input value="<?php echo rand(1111111111, 9999999999);?>" type="text" name="identification_number" />
    <br>
    <br>
    <input type="submit">
</form>