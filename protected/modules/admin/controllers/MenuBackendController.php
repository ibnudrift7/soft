<?php

class MenuBackendController extends ControllerAdmin
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
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MenuBackend;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		$model->parent = $_GET['parent'];
		if(isset($_POST['MenuBackend']))
		{
			$model->attributes=$_POST['MenuBackend'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$count = count(MenuBackend::model()->findAll('parent = :parent',array(':parent'=>$model->parent)));
					$model->sort = $count+1;
					$model->save();
					Log::createLog("MenuBackendController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id,'parent'=>$model->parent));
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

		if(isset($_POST['MenuBackend']))
		{
			$parent = $model->parent;
			$model->attributes=$_POST['MenuBackend'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					if ($parent!=$model->parent) {
						SortOrder::sortUlang('MenuBackend',$parent,'parent');
						SortOrder::sortUlang('MenuBackend',$model->parent,'parent');
					}
					Log::createLog("MenuBackendController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id,'parent'=>$model->parent));
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
			// @unlink(Yii::app()->basePath."/../upload/pdf/".$data->pdf);
			Log::createLog("Menu Backend Delete $data->id");
			$parent = $data->parent;
			$data->delete();
			SortOrder::sortUlang('MenuBackend',$parent,'parent');

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
		$model=new MenuBackend('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MenuBackend']))
			$model->attributes=$_GET['MenuBackend'];
		$model->parent=($_GET['parent']=='')?'0':$_GET['parent'];
		$dataProvider=new CActiveDataProvider('MenuBackend');
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
		$model=new MenuBackend('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MenuBackend']))
			$model->attributes=$_GET['MenuBackend'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSort()
	{
		SortOrder::sortTo($_GET['id'], $_GET['to'], 'MenuBackend',$_GET['parent'],'parent');
		$this->redirect(array('index', 'parent'=>$_GET['parent']));//redirect ke view
	}

	public function actionBuild()
	{
		MenuBackend::model()->buildAuthItems();
		$this->redirect(array('index', 'parent'=>$_GET['parent']));//redirect ke view
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=MenuBackend::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='menu-backend-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
