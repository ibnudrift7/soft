<?php

/**
 * This is the model class for table "karir_description".
 *
 * The followings are the available columns in table 'karir_description':
 * @property integer $id
 * @property integer $karir_id
 * @property integer $language_id
 * @property string $position
 * @property string $desc
 */
class KarirDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KarirDescription the static model class
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
		return 'karir_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position, desc', 'required'),
			array('karir_id, language_id', 'numerical', 'integerOnly'=>true),
			array('position', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, karir_id, language_id, position, desc', 'safe', 'on'=>'search'),
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
			'karirdescriptionDesc'=>array(self::HAS_ONE, 'KarirDescriptionDescription', 'karir_description_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'karir_id' => 'Karir',
			'language_id' => 'Language',
			'position' => 'Position',
			'desc' => 'Desc',
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
		$criteria->compare('karir_id',$this->karir_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('desc',$this->desc,true);
		// $criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getKarir($karir_id, $language_id)
	{
		return $this->find('karir_id = :karir_id AND language_id = :language_id', array(':karir_id'=>$karir_id, ':language_id'=>$language_id));
	}
	public function deleteKarir($karir_id)
	{
		$this->deleteAll('karir_id = :karir_id', array(':karir_id'=>$karir_description_id));
	}	

}