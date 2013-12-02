<?php

/**
 * This is the model class for table "artikel_description".
 *
 * The followings are the available columns in table 'artikel_description':
 * @property integer $id
 * @property integer $artikel_id
 * @property integer $language_id
 * @property string $title
 * @property string $content
 */
class ArtikelDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArtikelDescription the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'artikel_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('artikel_id, language_id, title, content', 'required'),
			array('artikel_id, language_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('content', 'length', 'min'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, artikel_id, language_id, title, content', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			// 'artikeldescriptionDesc'=>array(self::HAS_ONE, 'ArtikelDescriptionDescription', 'artikel_description_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'artikel_id' => 'Artikel',
			'language_id' => 'Language',
			'title' => 'Title',
			'content' => 'Content',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('artikel_id',$this->artikel_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		// $criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function getArtikel($artikel_id, $language_id)
	{
		return $this->find('artikel_id = :artikel_id AND language_id = :language_id', array(':artikel_id'=>$artikel_id, ':language_id'=>$language_id));
	}
	public function deleteArtikel($artikel_id)
	{
		$this->deleteAll('artikel_id = :artikel_id', array(':artikel_id'=>$artikel_id));
	}	

}