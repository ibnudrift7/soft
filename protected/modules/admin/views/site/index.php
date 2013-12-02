<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
)); ?>
<h2><?php echo 'Welcome to '.CHtml::encode(Yii::app()->name) ?></h2>

<?php $this->endWidget(); ?>
<?php //if (Yii::app()->user->checkAccess('administrator') OR Yii::app()->user->checkAccess('superEditor')): ?>
<div class="row">
<?php
$menu = MenuBackend::model()->findAll('parent = 0 AND active = "1" AND shortcut = "1" AND hidden = "0" ORDER BY sort');
$menuStr = '';
$menuNo = 0;
foreach ($menu as $key => $value) {
	$menu2 = MenuBackend::model()->findAll('parent = :parent AND active = "1" AND shortcut = "1" ORDER BY sort',array(':parent'=>$value->id));
	if (count($menu2)>0) {
		$menuStrTemp = '';
		$jumNo = 0;
		foreach ($menu2 as $k => $v) {
			$action = explode('|', $v->action);
			if (Yii::app()->user->checkAccess('admin.'.$v->url.'.'.$action[0])) {
				$menuStrTemp .= '<li class="span2">
					<a href="'.CHtml::normalizeUrl(array('/admin/'.$v->url.'/'.$action[0])).'" class="thumbnail">
						<div class="thumbnail">
							<img src="'.Yii::app()->baseUrl.'/asset/images/icon/'.$v->icon.'" alt="">
							<p class="text-tengah less">'.$v->name.'</p>
						</div>
					</a>
				</li>';
			}else{
				$jumNo++;
			}
		}
		$menuStr .= '<div class="span'.((count($menu2)-$jumNo)*2).'"><h3>'.$value->name.'</h3><ul class="thumbnails">';
		$menuStr .= $menuStrTemp;
		$menuStr .= '</ul></div>';
	} else {
		$action = explode('|', $value->action);
		if (Yii::app()->user->checkAccess('admin.'.$value->url.'.'.$action[0])) {
			if ($value->url == 'page') {// menu konten / page
				$menuKonten = Page::model()->createMenuBackend('',2,'');
				$menuStr .= '
					<div class="span'.((count($menuKonten))*2).'">
						<h3>'.$value->name.'</h3>
						<ul class="thumbnails">
				';
				foreach ($menuKonten as $k => $v) {
					$menuStr .= '
						<li class="span2">
							<a href="'.CHtml::normalizeUrl(array('/admin/page/update', 'id'=>$v['id'])).'" class="thumbnail">
								<div class="thumbnail">
									<img src="'.Yii::app()->baseUrl.'/asset/images/icon/'.$v['icon'].'" alt="">
									<p class="text-tengah less">'.$v['title'].'</p>
								</div>
							</a>
						</li>
					';
				}

				$menuStr .= '
						</ul>
					</div>';
			}else{
				$menuStr .= '
					<div class="span2">
						<h3>'.$value->name.'</h3>
						<ul class="thumbnails">
							<li class="span2">
								<a href="'.CHtml::normalizeUrl(array('/admin/'.$value->url.'/'.$action[0])).'" class="thumbnail">
									<div class="thumbnail">
										<img src="'.Yii::app()->baseUrl.'/asset/images/icon/'.$value->icon.'" alt="">
										<p class="text-tengah less">'.$value->name.'</p>
									</div>
								</a>
							</li>
						</ul>
					</div>';
			}
		}
	}
	
}
echo $menuStr;
?>
</div>

