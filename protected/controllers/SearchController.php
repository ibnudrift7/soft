<?php

class SearchController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/content';
		if ($_POST['search']) {
			$this->redirect(array('/search/index', 'search'=>$_POST['search'], 'lang'=>Yii::app()->language));
		}
		$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
		$url = Yii::app()->request->hostInfo;
		$languageId = $this->languageID;
		$query = Yii::app()->db->createCommand("
		(
		SELECT 
		`d`.`name` as `title`,
		`d`.`content` as `desc`,
		'' as `img`,
		CONCAT('".$url.CHtml::normalizeUrl(array('/about/index', 'url'=>'about-us', '#'=>'about-'))."', `t`.`id`) as `link`
		FROM `about` `t` INNER JOIN `about_description` `d`
		ON `t`.`id` = `d`.`about_id`
		WHERE
		(`d`.`name` LIKE '%".$_GET['search']."%' OR
 		`d`.`content` LIKE '%".$_GET['search']."%') AND
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		)
		UNION
		(
		SELECT 
		`d`.`name` as `title`,
		`d`.`content` as `desc`,
		CONCAT('/images/layanan/' , `t`.`image`) as `img`,
		CONCAT('".$url.CHtml::normalizeUrl(array('/layanan/view', 'id'=>''))."', `t`.`id`, '/url/', `d`.`name`) as `link`
		FROM `layanan` `t` INNER JOIN `layanan_description` `d`
		ON `t`.`id` = `d`.`layanan_id`
		WHERE
		(`d`.`name` LIKE '%".$_GET['search']."%' OR
 		`d`.`content` LIKE '%".$_GET['search']."%') AND
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		)
		UNION
		(
		SELECT 
		`d`.`title` as `title`,
		`d`.`content` as `desc`,
		CONCAT('/images/artikel/' , `t`.`image`) as `img`,
		CONCAT('".$url.CHtml::normalizeUrl(array('/artikel/view', 'id'=>''))."', `t`.`id`, '/url/', `d`.`title`) as `link`
		FROM `artikel` `t` INNER JOIN `artikel_description` `d`
		ON `t`.`id` = `d`.`artikel_id`
		WHERE
		(`d`.`title` LIKE '%".$_GET['search']."%' OR
		`d`.`content` LIKE '%".$_GET['search']."%') AND
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		)
		UNION
		(
		SELECT 
		`d`.`title` as `title`,
		`d`.`content` as `desc`,
		'' as `img`,
		CONCAT('".$baseUrl."','/' , `t`.`modul_target`, '/index/url/', `t`.`kode`) as `link`
		FROM `page` `t` INNER JOIN `page_description` `d`
		ON `t`.`id` = `d`.`page_id`
		WHERE
		(`d`.`title` LIKE '%".$_GET['search']."%' OR
 		`d`.`content` LIKE '%".$_GET['search']."%') AND
		`t`.`active` = '1' AND
		`d`.`language_id` = $languageId
		)
		ORDER BY `title` ASC
		")->query();


		$this->render('index', array(
			'model'=>$query,
		));
	}

}