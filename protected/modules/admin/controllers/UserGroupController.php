<?php

class UserGroupController extends ControllerAdmin
{
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('auth.filters.AuthFilter'),
		);
	}

	public function actionIndex()
	{
		$auth=Yii::app()->authManager;
		$model = $auth->getAuthItems(2);
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new UserGroup;
		if ($_POST['UserGroup']) {
			$model->attributes = $_POST['UserGroup'];
			if ($model->validate()) {
				$auth=Yii::app()->authManager;
				$auth->createRole($model->name);
				$this->redirect(array('index'));				
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionUpdate($group)
	{
		if ($_POST['action']) {
			$auth=Yii::app()->authManager;
			//remove data
			$model = $auth->getItemChildren($group);
			foreach ($model as $key => $value) {
				$auth->removeItemChild($group,$value->name);
			}
			//input data
			$role = $auth->getAuthItem($group);
			foreach ($_POST['action'] as $key => $value) {
				$role->addChild($key);
			}
			$this->refresh();
		}
		$model = User::model()->getAuthList($group);
		$this->render('update',array(
			'model'=>$model,
			'group'=>$group,
		));
	}
	public function actionTest()
	{
		$auth=Yii::app()->authManager;
		$model = $auth->getItemChildren('Administrator');
		foreach ($model as $key => $value) {
			print_r($value->name);
		}
	}
}
