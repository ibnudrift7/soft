<?php

/**
 * This is the model class for table "askus".
 *
 * The followings are the available columns in table 'askus':
 * @property integer $id
 * @property string $date_input
 * @property string $date_modif
 * @property string $active
 */
class Askus extends CActiveRecord
{
	public $picture;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Askus the static model class
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
		return 'askus';
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
			array('nama', 'length', 'max'=>200),
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
			'askusDesc'=>array(self::HAS_ONE, 'AskusDescription', 'askus_id'),
			'desc'=>array(self::HAS_ONE, 'AskusDescription', 'askus_id',
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
			'nama' => 'Writer',
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

	
	public function getAskus($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`masalah`, `d`.`cuplikan_masalah`, `d`.`content` FROM `askus` `t` INNER JOIN `askus_description` `d`
		ON `t`.`id` = `d`.`askus_id`
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
		SELECT `t`.`id`, `d`.`masalah`, `t`.`date_input`, YEAR(`date_input`) as `year`, MONTH(`date_input`) as `month` FROM `askus` `t` INNER JOIN `askus_description` `d`
		ON `t`.`id` = `d`.`askus_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		GROUP BY `year`, `month`
		ORDER BY `date_input` DESC
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$query2 = Yii::app()->db->createCommand("
			SELECT `t`.`id`, `d`.`masalah`, `d`.`cuplikan_masalah`, `d`.`content`, `t`.`date_input` FROM `askus` `t` INNER JOIN `askus_description` `d`
			ON `t`.`id` = `d`.`askus_id`
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
					'label'=>'<b>'.$v['masalah'].'</b></br>'.substr(strip_tags($v['content']),0,35).'....',
					'url'=>array('/askus/view', 'id'=> $v['id'], 'url'=> Slug::create($v['masalah']), 'lang'=>Yii::app()->language), 
					// 'active'=>false,
				);
			}
			$data[] = array(
				'label'=>date('F Y',strtotime($value['date_input'])),
				'url'=>array('/askus/index', 'url'=>'askus', 'year'=>$value['year'], 'month'=>$value['month'], 'lang'=>Yii::app()->language), 
				// 'active'=>false,
				'items'=>$data2
			);
		}
		// print_r($query);
		// exit;
		return $data;
	}
	
	public function getNewAskus($languageId=1, $page)
	{
		$perPage = 10;
		if ($page=='') $page = 1;
		$start = $page*$perPage-$perPage;

		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `d`.`masalah`, `d`.`cuplikan_masalah`, `d`.`content`,`t`.`date_input` FROM `askus` `t` INNER JOIN `askus_description` `d`
		ON `t`.`id` = `d`.`askus_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		LIMIT $start, $perPage
		")->query();
		return $query;
	}
	public function getNewAskusPagination($page)
	{
		$perPage = 10;
		if ($page=='') $page = 1;
		$pagination = array();
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id` FROM `askus` `t` INNER JOIN `askus_description` `d`
		ON `t`.`id` = `d`.`askus_id`
		WHERE
		`t`.`active` = '1'
		ORDER BY date_input DESC 
		")->query();
		$jml = count($query);
		$jmlHal = ceil($jml/$perPage);
		if ($page!=1) {
			$pagination[] = array('label'=>'<<', 'url'=>CHtml::normalizeUrl(array('index', 'lang'=>Yii::app()->language)));
			$pagination[] = array('label'=>'<', 'url'=>CHtml::normalizeUrl(array('index', 'page'=>$page-1, 'lang'=>Yii::app()->language)));
		}
		for ($i = 1; $i <= $jmlHal ; $i++) { 
			$pagination[] = array('label'=>$i, 'url'=>CHtml::normalizeUrl(array('index', 'page'=>$i, 'lang'=>Yii::app()->language)));
		}
		if ($jmlHal>$page) {
			$pagination[] = array('label'=>'>', 'url'=>CHtml::normalizeUrl(array('index', 'page'=>$page+1, 'lang'=>Yii::app()->language)));
			$pagination[] = array('label'=>'>>', 'url'=>CHtml::normalizeUrl(array('index', 'page'=>$jmlHal, 'lang'=>Yii::app()->language)));
		}
		return $pagination;
	}

	// public function getNewAskus($year=null,$month=null,$languageId=1)
	// {
	// 	$sql = '';
	// 	if ($year!='' AND $month!='') {
	// 		$sql = "
	// 		YEAR(`date_input`) = '$year' AND
	// 		MONTH(`date_input`) = '$month' AND
	// 		";
	// 	}
	// 	$query = Yii::app()->db->createCommand("
	// 	SELECT `t`.`id`, `d`.`masalah`, `d`.`content`,`t`.`date_input` FROM `askus` `t` INNER JOIN `askus_description` `d`
	// 	ON `t`.`id` = `d`.`askus_id`
	// 	WHERE
	// 	`t`.`active` = '1' AND
	// 	$sql
	// 	`d`.`language_id` = $languageId
	// 	ORDER BY date_input DESC 
	// 	LIMIT 0, 1
	// 	")->queryRow();
	// 	return $query;
	// }
	
	public function getAskusById($id, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`image`, `t`.`nama`, `t`.`date_input`, `d`.`masalah`, `d`.`cuplikan_masalah`, `d`.`content` FROM `askus` `t` INNER JOIN `askus_description` `d`
		ON `t`.`id` = `d`.`askus_id`
		WHERE
		`t`.`active` = '1' AND
		`t`.`id` = '$id' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		LIMIT 0, 1
		")->queryRow();
		return $query;
	}
	public function getAskusHome($languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`masalah`, `d`.`content`, `d`.`cuplikan_masalah`,`t`.`date_input` FROM `askus` `t` INNER JOIN `askus_description` `d`
		ON `t`.`id` = `d`.`askus_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		ORDER BY date_input DESC 
		LIMIT 0, 5
		")->query();
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array('content'=>'<b>'.date('d F Y',strtotime($value['date_input'])).'</b> - <a href="'.CHtml::normalizeUrl(array('/askus/detail/', 'id'=>$value['id'])).'">'.$value['masalah'].'</a>', 'htmlOptions'=>array());
		}
		return $data;
	}
	public function getAskusBy($criteria, $limit, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `d`.`masalah`, `d`.`content`, `d`.`cuplikan_masalah` FROM `askus` `t` INNER JOIN `askus_description` `d`
		ON `t`.`id` = `d`.`askus_id`
		WHERE
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		$criteria
		$limit
		")->query();
		return $query;
	}

}