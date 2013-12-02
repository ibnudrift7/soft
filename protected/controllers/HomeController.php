<?php

class HomeController extends Controller
{
	public function actionIndex()
	{
		$this->layout='//layouts/home';

		// get about
		$about = Page::Model()->getPage('about-us', $this->languageID);

		// get services
		$menu = Layanan::Model()->getSub($this->languageID);
		$layanan = Layanan::Model()->getLayanan($this->languageID);

		// get client
		$client = Client::Model()->getAll();

		$this->render('index', array(
			'about'=>$about,
			
			'menuLayanan'=>$menu,
			'layanan'=>$layanan,

			'client'=>$client,
		));
	}

	public function actionAbout()
	{
		$this->layout='//layouts/content';

		$this->render('about', array(
		));
	}

	public function actionService()
	{
		$this->layout='//layouts/content';

		$this->render('service', array(
		));
	}

	public function actionServicedetail()
	{
		$this->layout='//layouts/content';

		$this->render('servicedetail', array(
		));
	}

	public function actionNews()
	{
		$this->layout='//layouts/content';

		$this->render('news', array(
		));
	}

	public function actionNewsdetail()
	{
		$this->layout='//layouts/content';

		$this->render('newsdetail', array(
		));
	}

	public function actionContact()
	{
		$this->layout='//layouts/content';
		$model = new ContactForm;
		$this->render('contact', array(
			'model'=>$model,
		));
	}

	public function actionAppointment()
	{
		$this->layout='//layouts/content';
		$model = new ContactForm;
		$this->render('appointment', array(
			'model'=>$model,
		));
	}

}