<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/tampilan1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $setting=array();
	public $idController;

	// pasang meta description dan keyword
	public $metaDesc;
	public $metaKey;

	// simpan language ID
	public $languageID;

	public function beforeAction()
	{
		// if ($_GET['lang']) {
		// 	Yii::app()->language = $_GET['lang'];
		// }
		Yii::app()->language = "id";
		
		$this->languageID = Language::model()->find('code = :code', array( ':code'=> Yii::app()->language ))->id;
		$this->setting = Setting::model()->getSetting(Yii::app()->language);
		// $this->idController = $this->id;

		// $this->pageTitle = $this->setting['title'];
		// $this->metaDesc = $this->setting['description'];
		// $this->metaKey = $this->setting['keywords'];
		return true;
	}
}