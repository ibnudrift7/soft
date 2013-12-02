<?php

/**
 * This is the model class for table "kantor".
 *
 * The followings are the available columns in table 'kantor':
 * @property integer $id
 * @property string $pusat_kota
 * @property string $pusat_alamat
 * @property string $pusat_map
 * @property string $pusat_phone
 * @property string $pusat_fax
 * @property string $pusat_email
 * @property string $wakil_kota
 * @property string $wakil_alamat
 * @property string $wakil_map
 * @property string $wakil_phone
 * @property string $wakil_fax
 * @property string $wakil_email
 */
class Kantor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kantor the static model class
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
		return 'kantor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pusat_kota, pusat_alamat, pusat_map, pusat_phone, pusat_fax, pusat_email, wakil_kota, wakil_alamat, wakil_map, wakil_phone, wakil_fax, wakil_email', 'required'),
			// array('id', 'numerical', 'integerOnly'=>true),
			array('pusat_kota, pusat_alamat, pusat_phone, pusat_fax, pusat_email, wakil_kota, wakil_alamat, wakil_phone, wakil_fax, wakil_email', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pusat_kota, pusat_alamat, pusat_map, pusat_phone, pusat_fax, pusat_email, wakil_kota, wakil_alamat, wakil_map, wakil_phone, wakil_fax, wakil_email', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'pusat_kota' => 'Kota',
			'pusat_alamat' => 'Alamat',
			'pusat_map' => 'Map',
			'pusat_phone' => 'Phone',
			'pusat_fax' => 'Fax',
			'pusat_email' => 'Email',
			'wakil_kota' => 'Kota',
			'wakil_alamat' => 'Alamat',
			'wakil_map' => 'Map',
			'wakil_phone' => 'Phone',
			'wakil_fax' => 'Fax',
			'wakil_email' => 'Email',
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
		$criteria->compare('pusat_kota',$this->pusat_kota,true);
		$criteria->compare('pusat_alamat',$this->pusat_alamat,true);
		$criteria->compare('pusat_map',$this->pusat_map,true);
		$criteria->compare('pusat_phone',$this->pusat_phone,true);
		$criteria->compare('pusat_fax',$this->pusat_fax,true);
		$criteria->compare('pusat_email',$this->pusat_email,true);
		$criteria->compare('wakil_kota',$this->wakil_kota,true);
		$criteria->compare('wakil_alamat',$this->wakil_alamat,true);
		$criteria->compare('wakil_map',$this->wakil_map,true);
		$criteria->compare('wakil_phone',$this->wakil_phone,true);
		$criteria->compare('wakil_fax',$this->wakil_fax,true);
		$criteria->compare('wakil_email',$this->wakil_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getKantor()
	{
		return $this->findByPk(1);
	}
}