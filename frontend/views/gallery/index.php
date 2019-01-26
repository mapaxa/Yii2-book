<?php
/* @var $this yii\web\View */

use frontend\assets\GalleryAsset;

GalleryAsset::register($this); // в $this находится экземпляр класса View 

$this->registerJsFile('@web/js/gallery/scripts.js', ['depends' => [
        GalleryAsset::className()
]]); // для правильного подключения js файла

//echo GalleryAsset::className();
?>

<h1>Gallery</h1>
<!--<script src="/js/gallery/scripts.js" type="text/javascript"></script>-->


<div class="portfolioFilter">

    <a href="#" data-filter="*" class="current">All Categories</a>
    <a href="#" data-filter=".people">People</a>
    <a href="#" data-filter=".places">Places</a>
    <a href="#" data-filter=".food">Food</a>
    <a href="#" data-filter=".objects">Objects</a>

</div>
<div class="portfolioContainer">

    <div class="objects">
        <img src="/files/photos/watch.jpg" alt="image">
    </div>

    <div class="people places">
        <img src="/files/photos/surf.jpg" alt="image">
    </div>	

    <div class="food">
        <img src="/files/photos/burger.jpg" alt="image">
    </div>

    <div class="people places">
        <img src="/files/photos/subway.jpg" alt="image">
    </div>

    <div class="places objects">
        <img src="/files/photos/trees.jpg" alt="image">
    </div>

    <div class="people food objects">
        <img src="/files/photos/coffee.jpg" alt="image">
    </div>

    <div class="food objects">
        <img src="/files/photos/wine.jpg" alt="image">
    </div>	

    <div class="food">
        <img src="/files/photos/salad.jpg" alt="image">
    </div>	

</div>