<?php
/* @var $this yii\web\View */
/* @var $bookList[] frontend\controllers\BookshopController */
?>
<h1>bookshop/index</h1>

<?php foreach ($bookList as $book): ?>
  <div class="col-md-10">
    <h3><?php echo $book->name; ?></h3>
    <p><?php echo $book->getDatePublished(); ?></p>
    <p><i>publisher: </i><b><?php echo $book->getPublisherName(); ?></b></p>
    <p> <i><?php echo $book->getAuthorsFormat('Autor not set', 'Author:', 'Authors:'); ?> </i>
        <?php foreach ($book->getFullName() as $fullName): ?>
        <b><?php echo $fullName . '<br>'; ?></b>
      <?php endforeach; ?>
    </p>
    <hr>
  </div>

<?php endforeach; ?>
