<?php

/**
 * This is the model class for table "askus_description".
 *
 * The followings are the available columns in table 'askus_description':
 * @property integer $id
 * @property integer $askus_id
 * @property integer $language_id
 * @property string $masalah
 * @property string $content
 */
class AskusDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AskusDescription the static model class
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
		return 'askus_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('askus_id, language_id, masalah, content', 'required'),
			array('askus_id, language_id', 'numerical', 'integerOnly'=>true),
			array('masalah', 'length', 'max'=>200),
			array('content, cuplikan_masalah', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, askus_id, language_id, masalah, content', 'safe', 'on'=>'search'),
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
			// 'askusdescriptionDesc'=>array(self::HAS_ONE, 'AskusDescriptionDescription', 'askus_description_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'askus_id' => 'Askus',
			'language_id' => 'Language',
			'masalah' => 'Masalah',
			'cuplikan_masalah' => 'Cuplikan Masalah',
			'content' => 'Jawaban',
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
		$criteria->compare('askus_id',$this->askus_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('masalah',$this->masalah,true);
		$criteria->compare('content',$this->content,true);
		// $criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function getAskus($askus_id, $language_id)
	{
		return $this->find('askus_id = :askus_id AND language_id = :language_id', array(':askus_id'=>$askus_id, ':language_id'=>$language_id));
	}
	public function deleteAskus($askus_id)
	{
		$this->deleteAll('askus_id = :askus_id', array(':askus_id'=>$askus_id));
	}	

}