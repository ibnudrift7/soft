<?php

class GalleryController extends Controller
{
	public $modelSearch;
	public $modelJaringan;
	public $modelProv;
	
	public function actionIndex()
	{
		$this->layout='//tampilan/artikel';
		$data = Page::model()->getPage('gallery');
		$this->menu = GalleryMain::model()->getSub();
		$this->menuTitle = 'Event Gallery';
		$konten = GalleryMain::model()->getNewGallery($_GET['year'],$_GET['month']);
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
		$data = Page::model()->getPage('gallery');
		$this->menu = GalleryMain::model()->getSub();
		$this->menuTitle = 'Event Gallery';
		$konten = GalleryMain::model()->getGalleryById($id);
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