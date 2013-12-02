<?php

class StaticController extends Controller
{
	public $modelSearch;
	public $modelJaringan;
	public $modelProv;
	
	public function actionIndex($url)
	{
		$data = Page::model()->getPage($url);
		$this->menu = Page::model()->getSub($data['id'],$data['parent']);
		$this->menuTitle = Page::model()->getTitle($data['title'],$data['id'],$data['parent']);
		// $this->menu = array(
		// 	array('label'=>'Sejarah Perusahaan', 'url'=>array('/home/static', 'view'=>'sejarah')),
		// 	array('label'=>'Visi, Misi & Nilai', 'url'=>array('/home/static', 'view'=>'visi')),
		// 	array('label'=>'Struktur Organisasi', 'url'=>array('/home/static', 'view'=>'struktur')),
		// );
		$this->modelSearch = new SearchForm;
		$this->render('index', array(
			'data'=>$data,
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