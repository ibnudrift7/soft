<?php

class DefaultController extends ControllerAdmin
{
	public function actionIndex()
	{
		$this->render('index');
	}
}