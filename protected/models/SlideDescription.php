<?php

/**
 * This is the model class for table "slide_description".
 *
 * The followings are the available columns in table 'slide_description':
 * @property integer $id
 * @property integer $slide_id
 * @property integer $language_id
 * @property string $desc
 */
class SlideDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SlideDescription the static model class
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
		return 'slide_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('slide_id, language_id, desc', 'required'),
			array('slide_id, language_id', 'numerical', 'integerOnly'=>true),
			array('desc', 'length', 'min'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slide_id, language_id, desc', 'safe', 'on'=>'search'),
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
			'slidedescriptionDesc'=>array(self::HAS_ONE, 'SlideDescriptionDescription', 'slide_description_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'slide_id' => 'Slide',
			'language_id' => 'Language',
			'desc' => 'Alt',
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
		$criteria->compare('slide_id',$this->slide_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('desc',$this->desc,true);
		// $criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getSlide($slide_id, $language_id)
	{
		return $this->find('slide_id = :slide_id AND language_id = :language_id', array(':slide_id'=>$slide_id, ':language_id'=>$language_id));
	}
	public function deleteSlide($slide_id)
	{
		$this->deleteAll('slide_id = :slide_id', array(':slide_id'=>$slide_id));
	}	

}