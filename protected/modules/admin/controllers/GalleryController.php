<?php

class GalleryController extends ControllerAdmin
{
	public $varGet = 'gallery_main'; 
	public $varFk = 'gallery_main_id'; 
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/mainKosong';

	public function init()
	{
		if($_GET[$this->varGet]==NULL)
			throw new CHttpException(404,'The requested page does not exist.');
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			// 'accessControl', // perform access control for CRUD operations
			array('auth.filters.AuthFilter'),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Gallery;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			$model->{$this->varFk} = $_GET[$this->varGet];
			$img = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$img->name;
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$img->saveAs(Yii::getPathOfAlias('webroot').'/images/gallery/'.$model->image);
					$model->save();
					Log::createLog("Gallery Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['Gallery'];
			$model->image = $image;//mengembalikan nama file
			$model->{$this->varFk} = $_GET[$this->varGet];
			$img = CUploadedFile::getInstance($model,'image');//mengaktifkan upload file
			if($img->name!=''){//jika di edit
				$model->image = substr(md5(time()),0,5).'-'.$img->name;
			}
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if($img->name!=''){//jika di edit
						$img->saveAs(Yii::getPathOfAlias('webroot').'/images/gallery/'.$model->image);//upload file
						unlink(Yii::app()->basePath."/../images/gallery/".$image);
					}
					$model->save();
					Log::createLog("Gallery Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$data = $this->loadModel($id);
			unlink(Yii::app()->basePath."/../images/gallery/".$data->image);
			Log::createLog("Gallery Delete $data->id");
			$data->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin', $this->varGet=>$_GET[$this->varGet]));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery'])){
			$model->attributes=$_GET['Gallery'];
		}
		$model->{$this->varFk} = $_GET[$this->varGet];

		$dataProvider=new CActiveDataProvider('Gallery', array(
		    'criteria'=>array(
		        'condition'=>''.$this->varFk.'="'.$_GET[$this->varGet].'"',
		    ),
		    'pagination'=>array(
		        'pageSize'=>50,
		    ),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery'])){
			$model->attributes=$_GET['Gallery'];
		}
		$model->{$this->varFk} = $_GET[$this->varGet];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->find('id = :id AND '.$this->varFk.' = :'.$this->varFk,array(':id'=>$id,':'.$this->varFk=>$_GET[$this->varGet]));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
