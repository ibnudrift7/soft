<?php

/**
 * This is the model class for table "about".
 *
 * The followings are the available columns in table 'about':
 * @property integer $id
 * @property string $image
 * @property string $file
 * @property string $active
 * @property integer $sort
 */
class About extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return About the static model class
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
		return 'about';
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
			'aboutDesc'=>array(self::HAS_ONE, 'AboutDescription', 'about_id'),
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
	public function getSub($widget,$languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`name` FROM `about` `t` INNER JOIN `about_description` `d`
		ON `t`.`id` = `d`.`about_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'label'=>$value['name'], 
				'url'=>array('/about/index', 'url'=>'about', '#'=>'about-'.$value['id']), 
				'itemOptions'=>array(
					'onclick'=>$widget->renderJs('about-'.$value['id']),
				),
				'active'=>false,
			);
		}
		// print_r($query);
		// exit;
		return $data;
	}
	public function getAbout($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `t`.`file`, `d`.`name`, `d`.`content` FROM `about` `t` INNER JOIN `about_description` `d`
		ON `t`.`id` = `d`.`about_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		return $query;
	}
}