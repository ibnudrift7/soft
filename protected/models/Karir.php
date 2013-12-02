<?php

/**
 * This is the model class for table "karir".
 *
 * The followings are the available columns in table 'karir':
 * @property integer $id
 * @property string $posisi
 * @property string $date_open
 * @property string $date_close
 * @property string $date_input
 * @property string $date_modif
 * @property integer $active
 * @property integer $sort
 */
class Karir extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Karir the static model class
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
		return 'karir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_open, date_close, active', 'required'),
			array('active, sort', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_open, date_close, date_input, date_modif, active, sort', 'safe', 'on'=>'search'),
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
			'karirDesc'=>array(self::HAS_ONE, 'KarirDescription', 'karir_id'),
			'desc'=>array(self::HAS_ONE, 'KarirDescription', 'karir_id',
				'condition'=>'desc.language_id = 1',
			),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_open' => 'Date Open',
			'date_close' => 'Date Close',
			'date_input' => 'Date Input',
			'date_modif' => 'Date Modif',
			'active' => 'Active',
			'sort' => 'Sort',
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
		$criteria->compare('date_open',$this->date_open,true);
		$criteria->compare('date_close',$this->date_close,true);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_modif',$this->date_modif,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('sort',$this->sort);
		// $criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function getKarir($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`position`, `d`.`desc` FROM `karir` `t` INNER JOIN `karir_description` `d`
		ON `t`.`id` = `d`.`karir_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		return $query;
	}
	public function getDetail($id,$languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`position`, `d`.`desc` FROM `karir` `t` INNER JOIN `karir_description` `d`
		ON `t`.`id` = `d`.`karir_id`
		WHERE
		`t`.`active` = '1' AND
		`t`.`id` = $id AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->queryRow();
		return $query;
	}
	

	public function getSub($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`position`, `d`.`desc` FROM `karir` `t` INNER JOIN `karir_description` `d`
		ON `t`.`id` = `d`.`karir_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'label'=>$value['position'], 
				'url'=>array('/karir/detail', 'id'=>$value['id']), 
			);
		}
		// print_r($query);
		// exit;
		return $data;
	}


}