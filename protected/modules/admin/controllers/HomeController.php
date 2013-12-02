<?php

class HomeController extends ControllerAdmin
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//array('auth.filters.AuthFilter'),
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // deny all users
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('logout'),
				'users'=>array(Yii::app()->user->name),
			): array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$model = new LoginForm;
		$this->layout = '//layoutsAdmin/login';
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				Log::createLog("Login: $model->username");
				if (Yii::app()->user->returnUrl = '/cm/index.php') {
					$this->redirect(CHtml::normalizeUrl(array('/admin/site/index')));
				} else {
					$this->redirect(Yii::app()->user->returnUrl);
				}
		}
		$this->render('index', array(
			'model'=>$model,
		));
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(CHtml::normalizeUrl(array('/admin/home/index')));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}