<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $user
 * @property string $email
 * @property string $pass
 * @property string $last_login
 * @property integer $sts
 * @property integer $id_group
 */
class User extends CActiveRecord
{
	public $passold;
	public $passconf;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user, email, sts', 'required'),
			array('pass, passold, passconf', 'required', 'on'=>'updatepass'),
			array('pass', 'required', 'on'=>'insert'),
			array('sts', 'numerical', 'integerOnly'=>true),
			array('user, email, pass', 'length', 'max'=>100),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user, email, pass, last_login, sts', 'safe', 'on'=>'search'),
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
			// 'hotel'=>array(self::BELONGS_TO, 'Hotel', 'id_hotel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user' => 'User',
			'email' => 'Email',
			'pass' => 'Pass',
			'passold' => 'Old Password',
			'passconf' => 'Confirm Password',
			'last_login' => 'Last Login',
			'sts' => 'Sts',
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
		$criteria->compare('user',$this->user,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('sts',$this->sts);
		$criteria->condition='user != "root"';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getAuthList($group)
	{
		$menu = MenuBackend::model()->findAll('active = "1" AND url != "" AND hidden = "0"');

		$auth=Yii::app()->authManager;

		// show all item menu
		$data = array();
		foreach ($menu as $key => $value) {

			$action = explode('|', $value->action);
			$actionList = array();
			if (count($action)>0) {
				foreach ($action as $k => $v) {
					if ($v!='') {
						$actionList['admin.'.$value->url.'.'.$v] = array(
							'name'=>$v,
							'value'=>$auth->hasItemChild($group,'admin.'.$value->url.'.'.$v),
						);
					}
				}
			}
			$action = explode('|', $value->sub_action);
			$subActionList = array();
			if (count($action)>0) {
				foreach ($action as $k => $v) {
					if ($v!='') {
						$subActionList[$value->url.'_'.$v] =array(
							'name'=>$v,
							'value'=>$auth->hasItemChild($group,$value->url.'_'.$v),
						);
					}
				}
			}
			if (count($actionList)>0) {
				$data[] = array(
					'name'=>$value->name,
					'action'=>$actionList,
					'subAction'=>$subActionList,
				);
			}
		}
		return $data;
	}
}