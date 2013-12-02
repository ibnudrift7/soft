<?php

/**
 * This is the model class for table "master_city".
 *
 * The followings are the available columns in table 'master_city':
 * @property integer $id
 * @property string $city_name
 * @property integer $city_state_id
 */
class MasterCity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MasterCity the static model class
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
		return 'master_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_state_id', 'numerical', 'integerOnly'=>true),
			array('city_name', 'length', 'max'=>100),
			// array('state_country_id', 'length', 'min'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, city_name, city_state_id', 'safe', 'on'=>'search'),
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
			'prov'=>array(self::BELONGS_TO, 'MasterState', 'city_state_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_name' => 'City Name',
			'city_state_id' => 'City State',
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
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('city_state_id',$this->city_state_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
	            'pageSize' => 25,
	        ),
		));
	}
}