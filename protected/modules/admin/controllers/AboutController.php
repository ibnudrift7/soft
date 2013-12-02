<?php

class AboutController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
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
	 * If creation is successful, the browser will be redirected to the 'view' About.
	 */
	public function actionCreate()
	{
		$model = new About;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new AboutDescription;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['About']))
		{
			$model->attributes=$_POST['About'];
			//validation About Description
			unset($modelDesc);
			$valid=true;
			// print_r($_POST['AboutDescription']);
			// exit;
			foreach ($_POST['AboutDescription'] as $j => $mod) {
	            if (isset($_POST['AboutDescription'][$j])) {
	                $modelDesc[$j]=new AboutDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }
			// $image = CUploadedFile::getInstance($model,'image');
			// $model->image = substr(md5(time()),0,5).'-'.$image->name;
			// $file = CUploadedFile::getInstance($model,'file');
			// $model->file = substr(md5(time()),0,5).'-'.$file->name;
			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					// $image->saveAs(Yii::getPathOfAlias('webroot').'/images/about/'.$model->image);
					// $file->saveAs(Yii::getPathOfAlias('webroot').'/images/about/'.$model->file);
					//setting jumlah
					$count = About::model()->count();
					$model->sort = $count+1;
					$model->save();
					//save About Description
					foreach ($modelDesc as $key => $value) {
						$value->about_id=$model->id;
						$value->save();
					}
					Log::createLog("About Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' About.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = AboutDescription::model()->getAbout($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null)? new AboutDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['About']))
		{
			// $image = $model->image;//mengamankan nama file
			// $file = $model->file;//mengamankan nama file
			$model->attributes=$_POST['About'];//setting semua nilai
			// $model->image = $image;//mengembalikan nama file
			// $model->file = $file;//mengembalikan nama file
			// $image = CUploadedFile::getInstance($model,'image');//mengaktifkan upload file
			// $file = CUploadedFile::getInstance($model,'file');//mengaktifkan upload file
			// if($image->name!=''){//jika di edit
			// 	$model->image = substr(md5(time()),0,5).'-'.$image->name;
			// }
			// if($file->name!=''){//jika di edit
			// 	$model->file = substr(md5(time()),0,5).'-'.$file->name;
			// }
			unset($modelDesc);
			$valid=true;
			foreach ($_POST['AboutDescription'] as $j => $mod) {
	            if (isset($_POST['AboutDescription'][$j])) {
	                $modelDesc[$j]=new AboutDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }
			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					// if($image->name!=''){//jika di edit
					// 	$image->saveAs(Yii::getPathOfAlias('webroot').'/images/about/'.$model->image);//upload file
					// }
					// if($file->name!=''){//jika di edit
					// 	$file->saveAs(Yii::getPathOfAlias('webroot').'/images/about/'.$model->file);//upload file
					// }
					//setting nilai
					$model->save();
					//save About Description
					AboutDescription::model()->deleteAbout($model->id);
					foreach ($modelDesc as $key => $value) {
						$value->about_id=$model->id;
						$value->save();
					}
					Log::createLog("About Controller Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' About.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$data = $this->loadModel($id);
			// @unlink(Yii::app()->basePath."/../images/about/".$data->image);
			// @unlink(Yii::app()->basePath."/../images/about/".$data->file);
			Log::createLog("About Delete $data->id");
			$data->delete();
			SortOrder::sortUlang("About");

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new About('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['About']))
			$model->attributes=$_GET['About'];
		$dataProvider=new CActiveDataProvider('About');
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
		$model=new About('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['About']))
			$model->attributes=$_GET['About'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionSort()
	{
		SortOrder::sortTo($_GET['id'], $_GET['to'], 'About');
		$this->redirect(array('index'));//redirect ke view
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=About::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested About does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='About-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
