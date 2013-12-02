<?php

/**
 * This is the model class for table "jaringan".
 *
 * The followings are the available columns in table 'jaringan':
 * @property integer $id
 * @property integer $city_id
 * @property string $alamat
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $map
 */
class Jaringan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jaringan the static model class
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
		return 'jaringan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, alamat, phone, fax, email, map', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('alamat', 'length', 'max'=>200),
			array('phone, fax, email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, city_id, alamat, phone, fax, email, map', 'safe', 'on'=>'search'),
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
			'city'=>array(self::BELONGS_TO, 'MasterCity', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_id' => 'City',
			'alamat' => 'Alamat',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'email' => 'Email',
			'map' => 'Map',
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
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('map',$this->map,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getSub()
	{
		$query = Yii::app()->db->createCommand("
		SELECT * FROM `master_state` `t`
		ORDER BY state_name ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'label'=>$value['state_name'], 
				'url'=>array('/jaringan/index', 'state'=>$value['id']), 
			);
		}
		// print_r($query);
		// exit;
		return $data;
	}
	public function getKota($state)
	{
		if ($state=='') {
			$kota = MasterCity::model()->findAll(array(
				'order'=>'city_name ASC',
			));
		}else{
			$kota = MasterCity::model()->findAll('city_state_id = :city_state_id ORDER BY city_name ASC',array(':city_state_id'=>$state));
		}
		$kotaArray = array();
		foreach ($kota as $key => $value) {
			$kotaArray[]=array('label'=>$value->city_name, 'url'=>array('/jaringan/index', 'kota'=>$value->id, 'state'=>$state));
		}
		return $kotaArray;
	}
	public function getJaringan($kota)
	{
		$kota = $this->findAll('city_id = :city_id',array(':city_id'=>$kota));
		return $kota;
	}

}