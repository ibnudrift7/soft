<?php

/**
 * This is the model class for table "page_description".
 *
 * The followings are the available columns in table 'page_description':
 * @property integer $page_id
 * @property integer $language_id
 * @property string $title
 * @property string $intro
 * @property string $content
 */
class PageDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PageDescription the static model class
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
		return 'page_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('language_id, title', 'required'),
			array('page_id, language_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('intro', 'length', 'max'=>200),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('page_id, language_id, title, intro, content', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'page_id' => 'Page',
			'language_id' => 'Language Id',
			'title' => 'Title',
			'intro' => 'Menu Name',
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

		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getPage($page_id, $language_id)
	{
		return $this->find('page_id = :page_id AND language_id = :language_id', array(':page_id'=>$page_id, ':language_id'=>$language_id));

	}
	public function deletePage($page_id)
	{
		$this->deleteAll('page_id = :page_id', array(':page_id'=>$page_id));
	}	

}