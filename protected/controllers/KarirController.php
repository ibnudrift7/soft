<?php

class KarirController extends Controller
{
	public $modelSearch;
	public $modelJaringan;
	public $modelProv;

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}	

	public function actionIndex()
	{
		$data = Page::model()->getPage('karir');

		$this->menu = Karir::model()->getSub();

		$this->menuTitle = 'Karir';
		$kantor = Kantor::model()->getKantor();

		$this->modelSearch = new SearchForm;
		$model =  new Karirr;

		if(isset($_POST['Karirr']))
		{
			$model->attributes=$_POST['Karirr'];

			$file = CUploadedFile::getInstance($model,'cv');
			$model->cv = substr(md5(time()),0,5).'-'.$file->name;

			if($model->validate())
			{
				// upload file dokumen
				if($file->name != ''){
					$file->saveAs(Yii::getPathOfAlias('webroot').'/cv/'.$model->cv);
				}

				$subjects = "Karir From website Cahaya Medika";
				$messaged = $this->renderPartial('//mail/karir',array(
					'model'=>$model,
				),TRUE);

				
				$to = 'ibnu@markdesign.net';
				
				Yii::import('application.extensions.phpmailer.JPhpMailer');
				$mail = new JPhpMailer;
				
				//$mail->IsSMTP();  // telling the class to use SMTP
				$mail->Mailer = "mail";
				//$mail->Host = "mail.quality-movie.com";
				//$mail->Port = 26;
				//$mail->SMTPAuth = true; // turn on SMTP authentication
				//$mail->Username = "no-reply@quality-movie.com"; // SMTP username
				//$mail->Password = "C4O]B^Cmqo1q"; // SMTP password 
				
				$mail->ClearAddresses();
				$mail->AddAddress($to, $to);
				$mail->From = 'no-reply@markdesign.net';
				$mail->FromName = 'no-reply';
				$mail->Html = TRUE;
				$mail->Subject = $subjects;
				$mail->MsgHTML($messaged);
				$mail->AddAttachment(Yii::app()->basePath."/../cv/".$model->cv); 

				$mail->Send();

				//hapus file cv
				@unlink(Yii::app()->basePath."/../cv/".$model->cv);

				Yii::app()->user->setFlash('contact','Thank you for sending application. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}

		$this->render('index', array(
			'model'=>$model,
			'kantor'=>$kantor,
			'data'=>$data,
		));
	}

	public function actionDetail($id)
	{
		$data = Page::model()->getPage('karir');
		$this->menu = Karir::model()->getSub();
		$this->menuTitle = 'Karir';
		$kantor = Kantor::model()->getKantor();
		$karir = Karir::model()->getDetail($id);
		$data['content'] = $karir['desc'];
		$this->modelSearch = new SearchForm;
		$model =  new Karirr;
		
		$this->render('detail', array(
			'model'=>$model,
			'kantor'=>$kantor,
			'data'=>$data,
			'karir'=>$karir,
		));
	}
}