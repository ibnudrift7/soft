<?php

class StockController extends ControllerAdmin
{
	public $varGet = 'hotel'; 
	public $varFk = 'id_hotel'; 
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	public function beforeAction()
	{
		if($_GET[$this->varGet]==NULL AND $this->action->id != 'index')
			throw new CHttpException(404,'The requested page does not exist.');
		return TRUE;
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
		$model=new Stock;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
			$model->{$this->varFk} = $_GET[$this->varGet];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("StockController Create $model->id");
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

		if(isset($_POST['Stock']))
		{
			$model->attributes=$_POST['Stock'];
			$model->{$this->varFk} = $_GET[$this->varGet];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("StockController Update $model->id");
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
			$this->loadModel($id)->delete();

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
		$model=new Stock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock'])){
			$model->attributes=$_GET['Stock'];
			$stock = $model->getStockByDate($model);
			foreach ($stock as $key => $value) {
				$model2[$key]=new Stock;
				$model2[$key]->attributes = $value;
				// $model2[$key]->scenario = 'insert2';
			}
			if(isset($_POST['Stock']))
			{
				$valid=true;
		        foreach ($_POST['Stock'] as $j => $mod) {
		            if (isset($_POST['Stock'][$j])) {
		                $models[$j]=new Stock; // if you had static model only
		                $models[$j]->attributes=$mod;
						$models[$j]->id_package = $model->id_package;
		                $valid=$models[$j]->validate() && $valid;
		            }
		        }
				$model2=$models;
				if ($valid) {
					$transaction=$model->dbConnection->beginTransaction();
					try
					{
				        foreach ($_POST['Stock'] as $j => $mod) {
				        	if ($mod['ori']==1) {
				        		if (
				        		$stock[$j]['stock'] == $models[$j]->stock
								) {
								}else{
									$models[$j]->save();
								}
							} else {
								$model3 = Stock::model()->findByPk($models[$j]->id);
								$model3->attributes = $models[$j]->attributes;
								$model3->save();
							}
						}
// exit;
						Log::createLog("Stock Update");
						Yii::app()->user->setFlash('success','Data Edited');
					    $transaction->commit();
						$this->refresh();
					}
					catch(Exception $ce)
					{
					    $transaction->rollback();
					}
				}
			}
		}
		$modelBatch=new StockBatch;
		if(isset($_POST['StockBatch'])){
			$modelBatch->attributes=$_POST['StockBatch'];
			if ($modelBatch->validate()) {
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$tanggal = explode(',',$_POST['StockBatch']['date']);
					$dataKu = array(
						'stock'=>$modelBatch->stock,
					);
					$pack = Package::model()->findByPk($modelBatch->id_package);
					foreach ($tanggal as $key => $value) {
						$data = Stock::model()->find('id_package = :id_package AND date = :date', array(':id_package'=>$modelBatch->id_package,':date'=>$value));
						if ($data==NULL){//blm ada data 
							$m = new Stock;
							$m->id_package = $modelBatch->id_package;
							$m->stock = $pack->qty;
							$m->date = $value;
							foreach ($dataKu as $key => $value) {
								if ($value!='') {
								$m->{$key}=$value;
								}
							}
							$m->save();
							// echo CHtml::errorSummary($m);
						} else {//ada data
							foreach ($dataKu as $key => $value) {
								if ($value!='') {
								$data->{$key}=$value;
								}
							}
							$data->save();
						}
						
					}
					
					// exit;
					Log::createLog("Stock Batch Update");
					Yii::app()->user->setFlash('success','Data Batch Edited');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}
		$this->render('index',array(
			'model'=>$model,
			'model2'=>$model2,
			'stock'=>$stock,
			'modelBatch'=>$modelBatch,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Stock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stock'])){
			$model->attributes=$_GET['Stock'];
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
		$model=Stock::model()->find('id = :id AND '.$this->varFk.' = :'.$this->varFk,array(':id'=>$id,':'.$this->varFk=>$_GET[$this->varGet]));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='stock-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
