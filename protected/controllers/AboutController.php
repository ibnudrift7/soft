<?php

class AboutController extends Controller
{

	public function actionIndex()
	{
		
		// $data = Page::model()->getPage('about-us', $this->languageID);
		// $widget = $this->createWidget('application.extensions.scrollto.scrollto');
		// $menu = Layanan::model()->getSub($this->languageID);
		// $about = About::model()->getAbout($this->languageID);

		$this->render('index', array(
			// 'data'=>$data,
		));
	}

	/*
	public $modelSearch;
	public $modelJaringan;
	public $modelProv;
	
	public function actionIndex()
	{
		$this->layout='//tampilan/artikel';
		$data = Page::model()->getPage('artikel');
		$this->menu = Artikel::model()->getSub();
		$this->menuTitle = 'Artikel';
		$konten = Artikel::model()->getNewArtikel($_GET['year'],$_GET['month']);
		// $this->menu = array(
		// 	array('label'=>'Sejarah Perusahaan', 'url'=>array('/home/static', 'view'=>'sejarah')),
		// 	array('label'=>'Visi, Misi & Nilai', 'url'=>array('/home/static', 'view'=>'visi')),
		// 	array('label'=>'Struktur Organisasi', 'url'=>array('/home/static', 'view'=>'struktur')),
		// );
		$this->modelSearch = new SearchForm;
		$this->render('index', array(
			'data'=>$data,
			'konten'=>$konten,
		));
	}
	public function actionDetail($id)
	{
		$this->layout='//tampilan/artikel';
		$data = Page::model()->getPage('artikel');
		$this->menu = Artikel::model()->getSub();
		$this->menuTitle = 'Artikel';
		$konten = Artikel::model()->getArtikelById($id);
		// $this->menu = array(
		// 	array('label'=>'Sejarah Perusahaan', 'url'=>array('/home/static', 'view'=>'sejarah')),
		// 	array('label'=>'Visi, Misi & Nilai', 'url'=>array('/home/static', 'view'=>'visi')),
		// 	array('label'=>'Struktur Organisasi', 'url'=>array('/home/static', 'view'=>'struktur')),
		// );
		$this->modelSearch = new SearchForm;
		$this->render('index', array(
			'data'=>$data,
			'konten'=>$konten,
		));
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