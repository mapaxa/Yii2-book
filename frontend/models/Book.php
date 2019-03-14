<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * Description of Bookshop
 *
 * @author anty
 */
class Book extends ActiveRecord
{

  public static function tableName()
  {
    return '{{book}}';
  }

  public function rules()
  {
    return [
        [['name', 'publisher_id'], 'required'],
        [['isbn', 'date_published'], 'safe']
    ];
  }

  /**
   * 
   * @return string
   */
  public function getDatePublished()
  {
    return ($this->date_published) ? Yii::$app->formatter->asDate($this->date_published) : 'not set';
  }

  /**
   * 
   * @return Publisher | null
   */
  public function getPublisher()
  {
    return $this->hasOne(Publisher::className(), ['id' => 'publisher_id'])->one();
  }

  /**
   * 
   * @return string
   */
  public function getPublisherName()
  {
    return ($publisher = $this->getPublisher()) ? $publisher->name : 'not set';
  }

  /**
   * 
   * @return ActiveQuery
   */
  public function getBookToAuthorRelations()
  {
    return $this->hasMany(BookToAuthor::className(), ['book_id' => 'id']);
  }

  /**
   * 
   * @return Author[]
   */
  public function getAuthors()
  {
    return $this->hasMany(Author::className(), ['id' => 'author_id'])->via('bookToAuthorRelations')->all();
  }

  /**
   * 
   * @return array
   */
  public function getFullName()
  {
    $fullNameArray = [];
    if (is_array($this->getAuthors())) {
      foreach ($this->getAuthors() as $author) {
        $fullNameArray[] = $author->first_name . '  ' . $author->last_name;
      }
    }
    return $fullNameArray;
  }

  /**
   * 
   * @param type $AuthorNotSet
   * @param type $singleAuthor
   * @param type $multiplyAuthors
   * @return string | false
   */
  public function getAuthorsFormat(string $AuthorNotSet, string $singleAuthor, string $multiplyAuthors)
  {
    if (is_array($this->getFullName())) {
      if (empty($this->getFullName())) {
        return $AuthorNotSet;
      }
      return (count($this->getFullName()) > 1) ? $multiplyAuthors : $singleAuthor;
    }
  }

}
