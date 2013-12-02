<?php

/**
 * This is the model class for table "artikel".
 *
 * The followings are the available columns in table 'artikel':
 * @property integer $id
 * @property string $date_input
 * @property string $date_modif
 * @property string $active
 */
class Artikel extends CActiveRecord
{
	public $picture;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Artikel the static model class
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
		return 'artikel';
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
			array('writer', 'length', 'max'=>200),
			array('image, picture', 'safe'),
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
			'artikelDesc'=>array(self::HAS_ONE, 'ArtikelDescription', 'artikel_id'),
			'desc'=>array(self::HAS_ONE, 'ArtikelDescription', 'artikel_id',
				'condition'=>'desc.language_id = 2',
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
			'writer' => 'Writer',
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

	
	public function getArtikel($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `d`.`content` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
		ON `t`.`id` = `d`.`artikel_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		return $query;
	}
	

	
	public function getSub($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `t`.`date_input`, YEAR(`date_input`) as `year`, MONTH(`date_input`) as `month` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
		ON `t`.`id` = `d`.`artikel_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		GROUP BY `year`, `month`
		ORDER BY `date_input` DESC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$query2 = Yii::app()->db->createCommand("
			SELECT `t`.`id`, `d`.`title`, `d`.`content`, `t`.`date_input` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
			ON `t`.`id` = `d`.`artikel_id`
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
					'label'=>'<b>'.$v['title'].'</b></br>'.substr(strip_tags($v['content']),0,35).'....',
					'url'=>array('/artikel/view', 'id'=> $v['id'], 'url'=> Slug::create($v['title']), 'lang'=>Yii::app()->language), 
					// 'active'=>false,
				);
			}
			$data[] = array(
				'label'=>date('F Y',strtotime($value['date_input'])),
				'url'=>array('/artikel/index', 'url'=>'artikel', 'year'=>$value['year'], 'month'=>$value['month'], 'lang'=>Yii::app()->language), 
				// 'active'=>false,
				'items'=>$data2
			);
		}
		// print_r($query);
		// exit;
		return $data;
	}
	
	public function getNewArtikel($year=null,$month=null,$languageId=1)
	{
		$sql = '';
		if ($year!='' AND $month!='') {
			$sql = "
			YEAR(`date_input`) = '$year' AND
			MONTH(`date_input`) = '$month' AND
			";
		}
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `d`.`title`, `d`.`content`,`t`.`date_input` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
		ON `t`.`id` = `d`.`artikel_id`
		WHERE
		`t`.`active` = '1' AND
		$sql
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		")->query();
		return $query;
	}
	
	// public function getNewArtikel($year=null,$month=null,$languageId=1)
	// {
	// 	$sql = '';
	// 	if ($year!='' AND $month!='') {
	// 		$sql = "
	// 		YEAR(`date_input`) = '$year' AND
	// 		MONTH(`date_input`) = '$month' AND
	// 		";
	// 	}
	// 	$query = Yii::app()->db->createCommand("
	// 	SELECT `t`.`id`, `d`.`title`, `d`.`content`,`t`.`date_input` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
	// 	ON `t`.`id` = `d`.`artikel_id`
	// 	WHERE
	// 	`t`.`active` = '1' AND
	// 	$sql
	// 	`d`.`language_id` = $languageId
	// 	ORDER BY date_input DESC 
	// 	LIMIT 0, 1
	// 	")->queryRow();
	// 	return $query;
	// }
	
	public function getArtikelById($id, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `t`.`writer`, `t`.`date_input`, `d`.`title`, `d`.`content` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
		ON `t`.`id` = `d`.`artikel_id`
		WHERE
		`t`.`active` = '1' AND
		`t`.`id` = '$id' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		LIMIT 0, 1
		")->queryRow();
		return $query;
	}
	public function getArtikelHome($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `d`.`content`,`t`.`date_input` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
		ON `t`.`id` = `d`.`artikel_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		LIMIT 0, 5
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array('content'=>'<b>'.date('d F Y',strtotime($value['date_input'])).'</b> - <a href="'.CHtml::normalizeUrl(array('/artikel/detail/', 'id'=>$value['id'])).'">'.$value['title'].'</a>', 'htmlOptions'=>array());
		}
		return $data;
	}
	public function getArtikelBy($criteria, $limit, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`title`, `d`.`content` FROM `artikel` `t` INNER JOIN `artikel_description` `d`
		ON `t`.`id` = `d`.`artikel_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		$criteria
		$limit
		")->query();
		return $query;
	}

}