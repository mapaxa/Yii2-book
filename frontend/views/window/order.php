<?php 
/*var $model frontend\models\Window*/
if(Yii::$app->session->hasFlash('success')) {
  echo Yii::$app->session->getFlash('success');
}

if ($model->hasErrors()) {
  echo '<pre>';
  print_r($model->getErrors());
  echo '</pre>';
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
<h1>Выберите окно</h1>

<form method="post">
    <p>ширину</p>
    <input value="173" name="width" type="text" />
    <br>
    <br>
    <p>высоту</p>
    <input value="155" name="height" type="text">
    <br>
    <br>
    <p>количество камер</p>
    <input value="1" name="cameraCount" type="radio">1
    <input value="2" name="cameraCount" type="radio">2
    <input value="3" name="cameraCount" type="radio">3
    <br>
    <br>
    <p>общее количество створок</p>
    <input value="2" name="quantityLeaf"  type="text">
    <br>
    <br>
    <p>количество поворотных створок</p>
    <input value="2" name="quantityLeafRotation"  type="text">
    <br>
    <br>
    <p>Цвет</p>
    
    <select name="color">
        <option value="red">red</option>
        <option value="white">white</option>
        <option value="black">black</option>
    </select>
    <br>
    <br>
    <p>наличие подоконника </p>
    <input value="1" name="windowsill"  type="radio"> Да
    <input value="0" name="windowsill"  type="radio"> Нет
    <br>
    <br>
    <p>email заказчика</p>
    <input value="test@i.ua" name="email"  type="text">
    <br>
    <br>
    <p>Имя заказчика</p>
    <input value="alexandr" name="name"  type="text">
    <br>
    <br>
    <input type="submit">
</form>
    </body>
</html>