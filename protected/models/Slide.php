<?php

/**
 * This is the model class for table "slide".
 *
 * The followings are the available columns in table 'slide':
 * @property integer $id
 * @property string $image
 * @property string $url
 * @property integer $sort
 */
class Slide extends CActiveRecord
{
	public $picture;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Slide the static model class
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
		return 'slide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('url', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('image, url', 'length', 'max'=>225),
			array('image, picture', 'safe'),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, url, sort', 'safe', 'on'=>'search'),
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
			'slideDesc'=>array(self::HAS_ONE, 'SlideDescription', 'slide_id'),
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
			'url' => 'Url',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('sort',$this->sort);
		$criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function getSlide($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `d`.`name`, `d`.`content` FROM `slide` `t` INNER JOIN `slide_description` `d`
		ON `t`.`id` = `d`.`slide_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		return $query;
	}
	public function getSlideHome($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `d`.`desc` FROM `slide` `t` INNER JOIN `slide_description` `d`
		ON `t`.`id` = `d`.`slide_id`
		WHERE
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'src'=>Yii::app()->baseUrl.ImageHelper::thumb(958,396, '/images/slide/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')),
				'caption'=>'#caption-html-'.($key+1),
			);
		}
		return $data;
	}
	public function getSlideText($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `t`.`url`, `d`.`desc` FROM `slide` `t` INNER JOIN `slide_description` `d`
		ON `t`.`id` = `d`.`slide_id`
		WHERE
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'caption'=>'caption-html-'.($key+1),
				'text'=> $value['desc'],
				'url'=> $value['url'],
			);
		}
		return $data;
	}
	

	/*
	public function getSub($widget,$languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`name` FROM `slide` `t` INNER JOIN `slide_description` `d`
		ON `t`.`id` = `d`.`slide_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'label'=>$value['name'], 
				'url'=>array('/slide/index', 'url'=>'slide'), 
				'itemOptions'=>array(
					'onclick'=>$widget->renderJs('slide-'.$value['id']),
				),
				'active'=>false,
			);
		}
		// print_r($query);
		// exit;
		return $data;
	}
	*/

}