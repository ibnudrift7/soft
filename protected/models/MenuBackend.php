<?php

/**
 * This is the model class for table "menu_backend".
 *
 * The followings are the available columns in table 'menu_backend':
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $desc
 * @property string $url
 * @property string $action
 * @property string $icon
 * @property integer $sort
 * @property string $shortcut
 * @property string $hidden
 * @property string $active
 */
class MenuBackend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MenuBackend the static model class
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
		return 'menu_backend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent, name, shortcut, hidden, active', 'required'),
			array('parent, sort', 'numerical', 'integerOnly'=>true),
			array('name, desc, icon, get', 'length', 'max'=>200),
			array('url', 'length', 'max'=>100),
			array('action, sub_action', 'length', 'max'=>250),
			array('shortcut, hidden, active, position', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent, name, desc, url, action, icon, sort, shortcut, hidden, active', 'safe', 'on'=>'search'),
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
			'parent' => 'Parent',
			'name' => 'Name',
			'desc' => 'Desc',
			'url' => 'Controller',
			'action' => 'Action',
			'icon' => 'Icon',
			'sort' => 'Sort',
			'shortcut' => 'Shortcut',
			'hidden' => 'Hidden',
			'active' => 'Active',
			'get' => 'Get',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('shortcut',$this->shortcut,true);
		$criteria->compare('hidden',$this->hidden,true);
		$criteria->compare('active',$this->active,true);
		$criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getMenu($id = 0, $name = '')
	{
		$data=array();
		if ($id==0) {
			$data['0']='[Kontent Utama]';
		}
		$query = $this->findAll('active = "1" AND parent = :parent', array(':parent'=>$id));
		foreach ($query as $key => $value) {
			if ($id==0) {
				$data[$value->id]=$value->name;
			} else {
				$data[$value->id]=$name.' -> '.$value->name;
			}
			$data2 = $this->getMenu($value->id, $data[$value->id]);
			foreach ($data2 as $k => $v) {
				$data[$k]=$v;
			}
		}
		return $data;
	}
	public function getBreadcrump($id = 0)
	{
		$data=array();
		$query = $this->findAll('id = :id', array(':id'=>$id));
		foreach ($query as $key => $value) {
			$data[$value->name]=array('index','parent'=>$value->id);
			$data2 = $this->getBreadcrump($value->parent);
			foreach ($data2 as $k => $v) {
				$data[$k]=$v;
			}
		}
		return $data;
	}
	public function createMenu($id, $position)
	{
		$data=array();
		if ($id==0) {
		$query = $this->findAll('active = "1" AND hidden = "0" AND parent = :parent AND position LIKE :position ORDER BY sort ASC', array(':parent'=>$id, ':position'=>$position));
		} else {
		$query = $this->findAll('active = "1" AND hidden = "0" AND parent = :parent ORDER BY sort ASC', array(':parent'=>$id));
		}
		foreach ($query as $key => $value) {
			$data2 = $this->createMenu($value->id, $position);
			if (count($data2)==0) {
				$action = explode('|', $value->action);
				$data[]=array('label'=>$value->name, 'url'=>array('/admin/'.$value->url.'/'.$action[0]), 'active'=>($this->id=='admin/'.$value->url) ? TRUE : FALSE, 'visible'=>Yii::app()->user->checkAccess('admin.'.$value->url.'.'.$action[0]));
			} else {
				$data[]=array('label'=>$value->name, 'items'=>$data2);
			}
			
		}
		return $data;
	}

	public function buildAuthItems()
	{
		$menu = $this->findAll('active = "1" AND url != ""');

		$auth=Yii::app()->authManager;

		// remove all auth item
		$deleteAuth = $auth->getAuthItems(0);
		foreach ($deleteAuth as $key => $value) {
			$auth->removeAuthItem($value->name);
		}

		// insert all item menu
		foreach ($menu as $key => $value) {
			$action = explode('|', $value->action);
			if (count($action)>0) {
				foreach ($action as $k => $v) {
					if ($v!='') {
						$auth->createOperation('admin.'.$value->url.'.'.$v, ucfirst($value->url).' '.ucfirst($v));
					}
				}
			}
			$action = explode('|', $value->sub_action);
			if (count($action)>0) {
				foreach ($action as $k => $v) {
					if ($v!='') {
						$auth->createOperation($value->url.'_'.$v, ucfirst($value->url).' '.ucfirst($v));
					}
				}
			}
		}
	}
}