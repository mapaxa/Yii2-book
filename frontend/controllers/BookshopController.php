<?php

namespace frontend\controllers;

use frontend\models\Book;
use Yii;
use yii\web\Controller;

class BookshopController extends Controller
{

  public function actionIndex()
  {

    $conditions = ['publisher_id' => 1];
    $bookList = Book::find()/*->where($conditions)*/->limit(20)->all();
    
    return $this->render('index', [
                'bookList' => $bookList,
                    ]
    );
  }

  public function actionCreate()
  {
    $book = new Book;


    if ($book->load(Yii::$app->request->post()) && $book->save()) {
      Yii::$app->session->setFlash('success', 'Новая книга сохранена!');
      return $this->refresh();
    }

    return $this->render('create', ['book' => $book]);
  }

}
