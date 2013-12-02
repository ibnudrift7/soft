<?php

class SlideController extends ControllerAdmin
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
		$model=new Slide;

		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new SlideDescription;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slide']))
		{
			$model->attributes=$_POST['Slide'];
			unset($modelDesc);
			$valid=true;
			foreach ($_POST['SlideDescription'] as $j => $mod) {
	            if (isset($_POST['SlideDescription'][$j])) {
	                $modelDesc[$j]=new SlideDescription; // if you had static model only
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
					$targ_w = 850;
					$targ_h = 507;
					$jpeg_quality = 90;

					$src = Yii::getPathOfAlias('webroot').'/images/slide/large/'.$model->image;
					$img_r = imagecreatefromjpeg($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['Position']['x'],$_POST['Position']['y'],
					$targ_w,$targ_h,$_POST['Position']['w'],$_POST['Position']['h']);

					// header('Content-type: image/jpeg');
					imagejpeg($dst_r,Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image,$jpeg_quality);

					$model->image = json_encode(array(
						'image'=>$model->image,
						'x'=>$_POST['Position']['x'],
						'y'=>$_POST['Position']['y'],
						'w'=>$_POST['Position']['w'],
						'h'=>$_POST['Position']['h'],
					));
					// $image->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image);
					// $file->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->file);
					//setting jumlah
					$count = Slide::model()->count();
					$model->sort = $count+1;
					$model->save();
					//save Description
					foreach ($modelDesc as $key => $value) {
						$value->slide_id=$model->id;
						$value->save();
					}
					Log::createLog("Slide Create $model->id");
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
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = SlideDescription::model()->getSlide($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null)? new SlideDescription : $modelDesc[$value->code];
		}

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Slide']))
		{
			// $image = $model->image;//mengamankan nama file
			// $file = $model->file;//mengamankan nama file
			$model->attributes=$_POST['Slide'];//setting semua nilai
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
			foreach ($_POST['SlideDescription'] as $j => $mod) {
	            if (isset($_POST['SlideDescription'][$j])) {
	                $modelDesc[$j]=new SlideDescription; // if you had static model only
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
					$targ_w = 850;
					$targ_h = 507;
					$jpeg_quality = 90;

					$src = Yii::getPathOfAlias('webroot').'/images/slide/large/'.$model->image;
					$img_r = imagecreatefromjpeg($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['Position']['x'],$_POST['Position']['y'],
					$targ_w,$targ_h,$_POST['Position']['w'],$_POST['Position']['h']);

					// header('Content-type: image/jpeg');
					imagejpeg($dst_r,Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image,$jpeg_quality);

					$model->image = json_encode(array(
						'image'=>$model->image,
						'x'=>$_POST['Position']['x'],
						'y'=>$_POST['Position']['y'],
						'w'=>$_POST['Position']['w'],
						'h'=>$_POST['Position']['h'],
					));
					
					// if($image->name!=''){//jika di edit
					// 	$image->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image);//upload file
					// }
					// if($file->name!=''){//jika di edit
					// 	$file->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->file);//upload file
					// }
					
					$model->save();
					//save Description
					SlideDescription::model()->deleteSlide($model->id);
					foreach ($modelDesc as $key => $value) {
						$value->slide_id=$model->id;
						$value->save();
					}
					Log::createLog("Slide Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
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
		$model = new Slide;
		$image = CUploadedFile::getInstance($model,'image');
		if ($_POST['Slide']['image']!='') {
			$model->image = $_POST['Slide']['image'];
		} else {
			$model->image = substr(md5(time()),0,5).'-'.$image->name;
		}

		$image->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/large/'.$model->image);//upload file
		echo json_encode(array(
			'msg'=>'ok',
			'name'=>$model->image,
			'fullpath'=>Yii::app()->baseUrl.'/images/slide/large/'.$model->image.'?'.substr(md5(time()),0,5),
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
			$data->image = json_decode($data->image);
			@unlink(Yii::app()->basePath."/../images/slide/".$data->image->image);
			@unlink(Yii::app()->basePath."/../images/slide/large/".$data->image->image);
			// @unlink(Yii::app()->basePath."/../images/slide/".$data->file);
			Log::createLog("Slide Delete $data->id");
			$data->delete();

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
		$model=new Slide('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slide']))
			$model->attributes=$_GET['Slide'];
		
		$dataProvider=new CActiveDataProvider('Slide');
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
		$model=new Slide('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slide']))
			$model->attributes=$_GET['Slide'];
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSort()
	{
		SortOrder::sortTo($_GET['id'], $_GET['to'], 'Slide');
		$this->redirect(array('index'));//redirect ke view
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Slide::model()->find('id = :id',array(':id'=>$id));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='slide-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
