<?php

/**
 * This is the model class for table "gallery_main".
 *
 * The followings are the available columns in table 'gallery_main':
 * @property integer $id
 * @property string $date_input
 * @property string $date_modif
 * @property string $active
 */
class GalleryMain extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryMain the static model class
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
		return 'gallery_main';
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
			array('active', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_input, date_modif, active', 'safe', 'on'=>'search'),
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
			'gallerymainDesc'=>array(self::HAS_ONE, 'GalleryMainDescription', 'gallery_main_id'),
			'desc'=>array(self::HAS_ONE, 'GalleryMainDescription', 'gallery_main_id',
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
			'date_input' => 'Date Input',
			'date_modif' => 'Date Modif',
			'active' => 'Active',
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
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_modif',$this->date_modif,true);
		$criteria->compare('active',$this->active,true);
		// $criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function getGalleryMain($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `d`.`content`,`t`.`date_input` FROM `gallery_main` `t` INNER JOIN `gallery_main_description` `d`
		ON `t`.`id` = `d`.`gallery_main_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC
		")->query();
		return $query;
	}
	public function getNewGalleryMain($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `d`.`content`,`t`.`date_input` FROM `gallery_main` `t` INNER JOIN `gallery_main_description` `d`
		ON `t`.`id` = `d`.`gallery_main_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC
		LIMIT 0,1
		")->queryRow();
		return $query;
	}
	

	public function getSub($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `t`.`date_input`, YEAR(`date_input`) as `year`, MONTH(`date_input`) as `month` FROM `gallery_main` `t` INNER JOIN `gallery_main_description` `d`
		ON `t`.`id` = `d`.`gallery_main_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		GROUP BY `year`, `month`
		ORDER BY `date_input` DESC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$query2 = Yii::app()->db->createCommand("
			SELECT `t`.`id`, `d`.`title`, `t`.`date_input` FROM `gallery_main` `t` INNER JOIN `gallery_main_description` `d`
			ON `t`.`id` = `d`.`gallery_main_id`
			WHERE
			`t`.`active` = '1' AND
			`d`.`language_id` = $languageId AND
			YEAR(`date_input`) = '".$value['year']."' AND
			MONTH(`date_input`) = '".$value['month']."'
			ORDER BY `date_input` DESC
			")->query();
			$data2 = array();
			foreach ($query2 as $k => $v) {
				// print_r($v);
				// exit;
				$data2[] = array(
					'label'=>$v['title'],
					'url'=>array('/gallery/detail', 'id'=> $v['id']), 
					// 'active'=>false,
				);
			}
			$data[] = array(
				'label'=>date('F Y',strtotime($value['date_input'])),
				'url'=>array('/gallery/index', 'url'=>'gallery_main', 'year'=>$value['year'], 'month'=>$value['month']), 
				// 'active'=>false,
				'items'=>$data2
			);
		}
		// print_r($query);
		// exit;
		return $data;
	}
	public function getNewGallery($year=null,$month=null,$languageId=1)
	{
		$sql = '';
		if ($year!='' AND $month!='') {
			$sql = "
			YEAR(`date_input`) = '$year' AND
			MONTH(`date_input`) = '$month' AND
			";
		}
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `d`.`content` FROM `gallery_main` `t` INNER JOIN `gallery_main_description` `d`
		ON `t`.`id` = `d`.`gallery_main_id`
		WHERE
		`t`.`active` = '1' AND
		$sql
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		LIMIT 0, 1
		")->queryRow();
		$query['images'] = Gallery::model()->findAll('gallery_main_id = :gallery_main_id',array(':gallery_main_id'=>$query['id']));

		return $query;
	}
	public function getGalleryById($id, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `d`.`content` FROM `gallery_main` `t` INNER JOIN `gallery_main_description` `d`
		ON `t`.`id` = `d`.`gallery_main_id`
		WHERE
		`t`.`active` = '1' AND
		`t`.`id` = '$id' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		LIMIT 0, 1
		")->queryRow();
		$query['images'] = Gallery::model()->findAll('gallery_main_id = :gallery_main_id',array(':gallery_main_id'=>$query['id']));
		return $query;
	}
}