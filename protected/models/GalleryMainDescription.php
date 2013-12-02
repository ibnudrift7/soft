<?php

/**
 * This is the model class for table "gallery_main_description".
 *
 * The followings are the available columns in table 'gallery_main_description':
 * @property integer $di
 * @property integer $gallery_main_id
 * @property integer $language_id
 * @property string $title
 * @property string $content
 */
class GalleryMainDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryMainDescription the static model class
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
		return 'gallery_main_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content', 'required'),
			array('gallery_main_id, language_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('di, gallery_main_id, language_id, title, content', 'safe', 'on'=>'search'),
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
			'gallerymaindescriptionDesc'=>array(self::HAS_ONE, 'GalleryMainDescriptionDescription', 'gallery_main_description_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'di' => 'Di',
			'gallery_main_id' => 'Gallery Main',
			'language_id' => 'Language',
			'title' => 'Title',
			'content' => 'Content',
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

		$criteria->compare('di',$this->di);
		$criteria->compare('gallery_main_id',$this->gallery_main_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		// $criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function getGalleryMain($gallery_main_id, $language_id)
	{
		return $this->find('gallery_main_id = :gallery_main_id AND language_id = :language_id', array(':gallery_main_id'=>$gallery_main_id, ':language_id'=>$language_id));
	}
	public function deleteGalleryMain($gallery_main_id)
	{
		$this->deleteAll('gallery_main_id = :gallery_main_id', array(':gallery_main_id'=>$gallery_main_id));
	}	
	

	/*
	public function getSub($widget,$languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`name` FROM `gallery_main_description` `t` INNER JOIN `gallery_main_description_description` `d`
		ON `t`.`id` = `d`.`gallery_main_description_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array(
				'label'=>$value['name'], 
				'url'=>array('/gallery_main_description/index', 'url'=>'gallery_main_description'), 
				'itemOptions'=>array(
					'onclick'=>$widget->renderJs('gallery_main_description-'.$value['id']),
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