<?php

/**
 * This is the model class for table "layanan".
 *
 * The followings are the available columns in table 'layanan':
 * @property integer $id
 * @property string $image
 * @property string $file
 * @property string $active
 * @property integer $sort
 */
class Layanan extends CActiveRecord
{
	public $picture;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Layanan the static model class
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
		return 'layanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('active', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('image, file', 'length', 'max'=>200),
			array('active', 'length', 'max'=>1),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),
			array('image, picture', 'safe'),
			// array('file', 'file', 'types'=>'pdf', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			// array('file', 'file', 'types'=>'pdf', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, file, active, sort', 'safe', 'on'=>'search'),
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
			'layananDesc'=>array(self::HAS_ONE, 'LayananDescription', 'layanan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Image',
			'file' => 'File',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('active',$this->active,true);
		$criteria->compare('sort',$this->sort);
		$criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getMenu($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`name` FROM `layanan` `t` INNER JOIN `layanan_description` `d`
		ON `t`.`id` = `d`.`layanan_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array('label'=>$value['name'], 'url'=>array('/layanan/view', 'id'=>$value['id'], 'url'=>$value['name'], 'lang'=>Yii::app()->language));
		}
		// print_r($query);
		// exit;
		return $data;
	}

	public function getSub($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`name` FROM `layanan` `t` INNER JOIN `layanan_description` `d`
		ON `t`.`id` = `d`.`layanan_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'label'=>$value['name'], 
				'url'=>array('/layanan/view', 'id'=>$value['id'], 'url'=>Slug::create($value['name']), 'lang'=>Yii::app()->language), 
				'active'=>false,
			);
		}
		// print_r($data);
		// exit;
		return $data;
	}
	public function getLayanan($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `d`.`name`, `d`.`content` FROM `layanan` `t` INNER JOIN `layanan_description` `d`
		ON `t`.`id` = `d`.`layanan_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		// print_r($query);
		// exit;
		return $query;
	}
	public function getLayananById($id, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`name`, `t`.`image`, `d`.`content` FROM `layanan` `t` INNER JOIN `layanan_description` `d`
		ON `t`.`id` = `d`.`layanan_id`
		WHERE
		`t`.`active` = '1' AND
		`t`.`id` = '$id' AND
		`d`.`language_id` = $languageId
		ORDER BY t.sort ASC 
		LIMIT 0, 1
		")->queryRow();
		return $query;
	}
	public function getLayananBy($criteria, $limit, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `d`.`name`, `d`.`content` FROM `layanan` `t` INNER JOIN `layanan_description` `d`
		ON `t`.`id` = `d`.`layanan_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		$criteria
		ORDER BY sort ASC
		$limit
		")->query();
		return $query;
	}
}