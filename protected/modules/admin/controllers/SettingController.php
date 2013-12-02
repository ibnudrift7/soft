<?php

class SettingController extends ControllerAdmin
{
	public function actionIndex()
	{
		$model = Setting::model()->getModelSetting('setting');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$transaction=$model2->dbConnection->beginTransaction();
			try
			{
				$setting = $_POST['Setting'];
				foreach ($setting as $key => $value) {
					if ( ! is_array($value)) {
						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $value;
						$modelSetting->save();
					}else{
						foreach ($value as $k => $v) {
							$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
							if ($modelSetting==null) {
								$modelSetting = new SettingDescription;
								$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
								$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
								$modelSetting->setting_id = $setting_id;
								$modelSetting->language_id = $language_id;
							}
							$modelSetting->value = $v;
							$modelSetting->save();
						}
					}
				}
				Log::createLog("Setting Update");
				Yii::app()->user->setFlash('success','Data has been updated');
			    $transaction->commit();
				$this->refresh();
			}
			catch(Exception $ce)
			{
			    $transaction->rollback();
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionHome()
	{
		$model = Setting::model()->getModelSetting('home');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$transaction=$model2->dbConnection->beginTransaction();
			try
			{
				$setting = $_POST['Setting'];
				foreach ($setting as $key => $value) {
					if ( ! is_array($value)) {
						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $value;
						$modelSetting->save();
					}else{
						foreach ($value as $k => $v) {
							$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
							if ($modelSetting==null) {
								$modelSetting = new SettingDescription;
								$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
								$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
								$modelSetting->setting_id = $setting_id;
								$modelSetting->language_id = $language_id;
							}
							$modelSetting->value = $v;
							$modelSetting->save();
						}
					}
				}
				Log::createLog("Setting Update");
				Yii::app()->user->setFlash('success','Data has been updated');
			    $transaction->commit();
				$this->refresh();
			}
			catch(Exception $ce)
			{
			    $transaction->rollback();
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionLog()
	{
		$model=new Log('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Log'])){
			$model->attributes=$_GET['Log'];
		}

		$dataProvider=new CActiveDataProvider('Log');
		$this->render('log',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}
}
