<?php

/**
 * This is the model class for table "page_illustrasi".
 *
 * The followings are the available columns in table 'page_illustrasi':
 * @property integer $id
 * @property integer $id_page
 * @property string $nama
 * @property string $images
 */
class PageIllustrasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PageIllustrasi the static model class
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
		return 'page_illustrasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_page', 'required'),
			array('id_page', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('images', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			array('images', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// Please remove those attributes that should not be searched.
			array('id, id_page, images', 'safe', 'on'=>'search'),
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
			'id_page' => 'Pages',
			'images' => 'Photo',
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
		$criteria->compare('id_page',$this->id_page);		
		$criteria->compare('images',$this->images,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function getImage($data)
	{
		// if ($data->type==0) {
			return Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/page-ill/'.$data->images, array('method' => 'resize', 'quality' => '90'));
		// } else {
			// return Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/product/'.Product::model()->findByPk($data->title)->image, array('method' => 'resize', 'quality' => '90'));
		// }
		
	}

	public function getLesOne($id)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'id_page=:id_page';
		$criteria->params = array(':id_page' => $id);

		return ( $this->count( $criteria ) >= 1 )? true : false;
	}

	public function getFromPageid($id)
	{
		// $active = 1;
		if($id == '')
			throw new CHttpException(404,'The requested page does not exist.');
			
		$criteria = new CDbCriteria;
		$criteria->condition = 'id_page = :id_page';
		$criteria->params = array(
					'id_page'=>$id,
					// 'active'=>$active,
			);
		$criteria->limit = '1';
		$criteria->order = "sort asc";

		$query = $this->findAll($criteria);

		return $query;
	}
}