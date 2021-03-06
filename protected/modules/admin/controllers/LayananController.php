<?php

class LayananController extends ControllerAdmin
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
	 * If creation is successful, the browser will be redirected to the 'view' Layanan.
	 */
	public function actionCreate()
	{
		$model = new Layanan;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new LayananDescription;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Layanan']))
		{
			$model->attributes=$_POST['Layanan'];
			//validation Layanan Description
			unset($modelDesc);
			$valid=true;
			// print_r($_POST['LayananDescription']);
			// exit;
			foreach ($_POST['LayananDescription'] as $j => $mod) {
	            if (isset($_POST['LayananDescription'][$j])) {
	                $modelDesc[$j]=new LayananDescription; // if you had static model only
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

					// resize image
					$targ_w = 195;
					$targ_h = 232;
					$jpeg_quality = 90;

					$src = Yii::getPathOfAlias('webroot').'/images/layanan/large/'.$model->image;
					$img_r = imagecreatefromjpeg($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['Position']['x'],$_POST['Position']['y'],
					$targ_w,$targ_h,$_POST['Position']['w'],$_POST['Position']['h']);

					// header('Content-type: image/jpeg');
					imagejpeg($dst_r,Yii::getPathOfAlias('webroot').'/images/layanan/'.$model->image,$jpeg_quality);

					$model->image = json_encode(array(
						'image'=>$model->image,
						'x'=>$_POST['Position']['x'],
						'y'=>$_POST['Position']['y'],
						'w'=>$_POST['Position']['w'],
						'h'=>$_POST['Position']['h'],
					));

					// $image->saveAs(Yii::getPathOfAlias('webroot').'/images/layanan/'.$model->image);
					// $file->saveAs(Yii::getPathOfAlias('webroot').'/images/layanan/'.$model->file);
					//setting jumlah
					$count = Layanan::model()->count();
					$model->sort = $count+1;
					$model->save();
					//save Layanan Description
					foreach ($modelDesc as $key => $value) {
						$value->layanan_id=$model->id;
						$value->save();
					}
					Log::createLog("Layanan Controller Create $model->id");
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
	 * If update is successful, the browser will be redirected to the 'view' Layanan.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = LayananDescription::model()->getLayanan($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null)? new LayananDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Layanan']))
		{
			// $image = $model->image;//mengamankan nama file
			// $file = $model->file;//mengamankan nama file
			$model->attributes=$_POST['Layanan'];//setting semua nilai
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
			foreach ($_POST['LayananDescription'] as $j => $mod) {
	            if (isset($_POST['LayananDescription'][$j])) {
	                $modelDesc[$j]=new LayananDescription; // if you had static model only
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
					// resize image
					$targ_w = 195;
					$targ_h = 232;
					$jpeg_quality = 90;

					$src = Yii::getPathOfAlias('webroot').'/images/layanan/large/'.$model->image;
					$img_r = imagecreatefromjpeg($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['Position']['x'],$_POST['Position']['y'],
					$targ_w,$targ_h,$_POST['Position']['w'],$_POST['Position']['h']);

					// header('Content-type: image/jpeg');
					imagejpeg($dst_r,Yii::getPathOfAlias('webroot').'/images/layanan/'.$model->image,$jpeg_quality);

					$model->image = json_encode(array(
						'image'=>$model->image,
						'x'=>$_POST['Position']['x'],
						'y'=>$_POST['Position']['y'],
						'w'=>$_POST['Position']['w'],
						'h'=>$_POST['Position']['h'],
					));

					// if($image->name!=''){//jika di edit
					// 	$image->saveAs(Yii::getPathOfAlias('webroot').'/images/layanan/'.$model->image);//upload file
					// }
					// if($file->name!=''){//jika di edit
					// 	$file->saveAs(Yii::getPathOfAlias('webroot').'/images/layanan/'.$model->file);//upload file
					// }
					//setting nilai
					$model->save();
					//save Layanan Description
					LayananDescription::model()->deleteLayanan($model->id);
					foreach ($modelDesc as $key => $value) {
						$value->layanan_id=$model->id;
						$value->save();
					}
					Log::createLog("Layanan Controller Update $model->id");
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

		// manipulasi data image
		$model->picture = json_decode($model->image);
		$model->image = $model->picture->image;

		$this->render('update',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	public function actionUpload()
	{
		$model = new Layanan;
		$image = CUploadedFile::getInstance($model,'image');
		if ($_POST['Layanan']['image']!='') {
			$model->image = $_POST['Layanan']['image'];
		} else {
			$model->image = substr(md5(time()),0,5).'-'.$image->name;
		}

		$image->saveAs(Yii::getPathOfAlias('webroot').'/images/layanan/large/'.$model->image);//upload file
		echo json_encode(array(
			'msg'=>'ok',
			'name'=>$model->image,
			'fullpath'=>Yii::app()->baseUrl.'/images/layanan/large/'.$model->image.'?'.substr(md5(time()),0,5),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' Layanan.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$data = $this->loadModel($id);
			$data->image = json_decode($data->image);
			@unlink(Yii::app()->basePath."/../images/layanan/".$data->image->image);
			@unlink(Yii::app()->basePath."/../images/layanan/large/".$data->image->image);
			Log::createLog("Layanan Delete $data->id");
			$data->delete();
			SortOrder::sortUlang("Layanan");

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
		$model=new Layanan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Layanan']))
			$model->attributes=$_GET['Layanan'];
		$dataProvider=new CActiveDataProvider('Layanan');
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
		$model=new Layanan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Layanan']))
			$model->attributes=$_GET['Layanan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionSort()
	{
		SortOrder::sortTo($_GET['id'], $_GET['to'], 'Layanan');
		$this->redirect(array('index'));//redirect ke view
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Layanan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested Layanan does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Layanan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
