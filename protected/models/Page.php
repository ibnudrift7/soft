<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $id
 * @property integer $parent
 * @property string $url
 * @property string $kode
 * @property string $modul_target
 * @property integer $sort
 * @property string $date_input
 * @property string $date_modif
 * @property string $active
 * @property string $hidden
 * @property string $modul
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
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
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('kode', 'required'),
			array('parent, sort', 'numerical', 'integerOnly'=>true),
			array('url, modul_target', 'length', 'max'=>100),
			array('kode, icon', 'length', 'max'=>200),
			array('active, hidden, modul, hide_menu', 'length', 'max'=>1),
			array('id, parent, url, kode, modul_target, sort, date_input, date_modif, active, hidden, menu_modul', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent, url, kode, modul_target, sort, date_input, date_modif, active, hidden, modul', 'safe', 'on'=>'search'),
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
			'pages'=>array(self::HAS_MANY, 'PageDescription', 'page_id'),
			'submenu'=>array(self::HAS_MANY, 'Page', 'parent'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent' => 'Parent',
			'url' => 'Url',
			'kode' => 'Kode',
			'modul_target' => 'Modul Target',
			'sort' => 'Sort',
			'date_input' => 'Date Input',
			'date_modif' => 'Date Modif',
			'active' => 'Active',
			'hidden' => 'Hidden',
			'modul' => 'Modul',
			'menu_modul' => 'Menu Modul',
			'hide_menu' => 'Hide From Menu',
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
		$criteria->compare('parent',$this->parent);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('modul_target',$this->modul_target,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_modif',$this->date_modif,true);
		$criteria->compare('active',$this->active,true);
		$criteria->compare('hidden',$this->hidden,true);
		$criteria->compare('modul',$this->modul,true);
		$criteria->compare('menu_modul',$this->menu_modul,true);
		$criteria->order = 'sort ASC';
		if ( ! Yii::app()->user->checkAccess('page_showHome')) {
			// $criteria->condition = 'modul_target != "home"';
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
	            'pageSize' => 25,
	        ),
		));
	}
	public function getBreadcrump($id = 0)
	{
		$data=array();
		$query = $this->findAll('id = :id', array(':id'=>$id));
		foreach ($query as $key => $value) {
			$data[$value->kode]=array('index','parent'=>$value->id);
			$data2 = $this->getBreadcrump($value->parent);
			foreach ($data2 as $k => $v) {
				$data[$k]=$v;
			}
		}
		return $data;
	}
	public function createMenu($id=0, $languageId=1, $controller='')
	{
		$data=array();
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`parent`, `t`.`url`, `t`.`modul_target`, `d`.`title`, `d`.`intro` FROM `page` `t` INNER JOIN `page_description` `d`
		ON `t`.`id` = `d`.`page_id`
		WHERE
		`t`.`active` = '1' AND
		`t`.`hidden` = '0' AND
		`t`.`parent` = '$id' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		// $query = $this->with('pages')->findAll('active = "1" AND parent = :parent AND pages.language_id = :language_id', array(':parent'=>$id, ':language_id'=>$languageId));
		foreach ($query as $key => $value) {
			$data2 = $this->createMenu($value['id']);
			if ($value['url']=='our-services') {
				$data2 = Layanan::model()->getMenu($languageId);
			}
			if (count($data2)==0) {
				$data[]=array('label'=>($value['intro']), 'url'=>array('/'.$value['modul_target'].'/index', 'url'=>$value['url'], 'lang'=>Yii::app()->language), 'active'=>($controller==$value['modul_target'])?true:false);
			} else {
				$data[]=array('label'=>($value['intro']), 'url'=>array('/'.$value['modul_target'].'/index', 'url'=>$value['url'], 'lang'=>Yii::app()->language), 'items'=>$data2);
			}
			
		}
		return $data;
	}

	public function createMenuBackend($id=0, $languageId=1, $controller='')
	{
		$data=array();
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`parent`, `t`.`url`, `t`.`modul_target`, `t`.`icon`, `d`.`title` FROM `page` `t` INNER JOIN `page_description` `d`
		ON `t`.`id` = `d`.`page_id`
		WHERE
		`t`.`active` = '1' AND
		`t`.`hidden` = '0' AND
		`t`.`parent` = '$id' AND
		`t`.`hide_menu` = '0' AND
		`d`.`language_id` = $languageId
		ORDER BY sort ASC
		")->query();
		foreach ($query as $key => $value) {
			$data[] = $value;
		}
		return $data;
	}

	public function getPage($url, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`parent`, `t`.`url`, `t`.`modul_target`, `d`.`title`, `d`.`content` FROM `page` `t` INNER JOIN `page_description` `d`
		ON `t`.`id` = `d`.`page_id`
		WHERE
		`t`.`url` = '$url' AND
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		")->queryRow();
		// print_r($query);
		// exit;
		return $query;
	}
	public function getSub($parent, $bila_sub_kosong, $languageId=1)
	{
		$query = Yii::app()->db->createCommand("
		SELECT `t`.`id`, `t`.`parent`, `t`.`url`, `t`.`modul_target`, `d`.`title` FROM `page` `t` INNER JOIN `page_description` `d`
		ON `t`.`id` = `d`.`page_id`
		WHERE
		`t`.`parent` = '$parent' AND
		`t`.`active` = '1' AND
		`t`.`hidden` = '0' AND
		`d`.`language_id` = $languageId
		")->query();
		if (count($query)==0) {
			$query = Yii::app()->db->createCommand("
			SELECT `t`.`id`, `t`.`parent`, `t`.`url`, `t`.`modul_target`, `d`.`title` FROM `page` `t` INNER JOIN `page_description` `d`
			ON `t`.`id` = `d`.`page_id`
			WHERE
			`t`.`parent` = '$bila_sub_kosong' AND
			`t`.`active` = '1' AND
			`t`.`hidden` = '0' AND
			`d`.`language_id` = $languageId
			")->query();
			if ($bila_sub_kosong==0) {
				$query = array();
			}
		}
		$data = array();
		foreach ($query as $key => $value) {
			$data[] = array('label'=>$value['title'], 'url'=>array('/'.$value['modul_target'].'/index', 'url'=>$value['url']));
		}
		return $data;
	}
	public function getTitle($title,$parent, $bila_sub_kosong, $languageId=1)
	{
		$tempTitle = $title;
		$query = Yii::app()->db->createCommand("
		SELECT count(`t`.`id`) as jum FROM `page` `t` INNER JOIN `page_description` `d`
		ON `t`.`id` = `d`.`page_id`
		WHERE
		`t`.`parent` = '$parent' AND
		`t`.`active` = '1' AND
		`t`.`hidden` = '0' AND
		`d`.`language_id` = $languageId
		")->queryRow();
		if ($query['jum']==0 OR $query==NULL) {
			$query = Yii::app()->db->createCommand("
			SELECT `d`.`title` FROM `page` `t` INNER JOIN `page_description` `d`
			ON `t`.`id` = `d`.`page_id`
			WHERE
			`t`.`id` = '$bila_sub_kosong' AND
			`t`.`active` = '1' AND
			`t`.`hidden` = '0' AND
			`d`.`language_id` = $languageId
			")->queryRow();
			$title = $query['title'];
			if ($title=='') {
				$title=$tempTitle;
			}
		}
		// print_r($title ) ;
		// print_r($query);
		// exit;
		return $title;
	}


}