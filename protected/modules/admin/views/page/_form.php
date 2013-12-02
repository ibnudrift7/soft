<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/jquery.tagit.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/tagit.ui-zendesk.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/asset/js/tagit/source/js/tag-it.min.js'); ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'page-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model);  ?>
	<?php 
	foreach ($modelDesc as $key => $value): 
		echo $form->errorSummary($value); 
	endforeach
	?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php if (Yii::app()->user->checkAccess('page_editKode')): ?>
	<?php echo $form->textFieldRow($model,'kode',array('class'=>'span5','maxlength'=>200)); ?>
	<?php endif ?>

	<?php
	// print_r($model->attributes);
			$tabs = array();
		foreach ($modelDesc as $key => $value) {
			$lang = Language::model()->getName($key);
			$tabs[] = array('label'=>$lang->name, 'content'=>

		        $form->textFieldRow($value,'['.$lang->code.']title',array('class'=>'span5','maxlength'=>100)).
		        ((Yii::app()->user->checkAccess('page_editIntro'))?$form->textFieldRow($value,'['.$lang->code.']intro',array('class'=>'span5','maxlength'=>200)):'').
		        $form->textAreaRow($value,'['.$lang->code.']content',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))
		        , 'active'=>($key=='id')?TRUE:false,

		    );
			$this->widget('application.extensions.extckeditor.ExtCKEditor', array(
				'model'=>$value,
				'attribute'=>'['.$lang->code.']content', // model atribute
				'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
				'return'=>TRUE, // Toolbar settings (full, basic, advanced)
				'contentCSS'=>Yii::app()->baseUrl.'/asset/css/styles-text.css',
			));
		}
	?>
	<?php 
		$this->widget('bootstrap.widgets.TbTabs', array(
		    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
		    'placement'=>'above', // 'above', 'right', 'below' or 'left'
		    'tabs'=>$tabs,
		)); 
	?>

	<?php if (Yii::app()->user->checkAccess('page_editActive')): ?>
	<?php echo $form->dropDownListRow($model, 'active', array(
		'1'=>'Active',
		'0'=>'Deactive',
	)); ?>
	<?php endif ?>

	<?php if (Yii::app()->user->checkAccess('page_editHidden')): ?>
	<?php echo $form->dropDownListRow($model, 'hidden', array(
		'0'=>'Deactive',
		'1'=>'Active',
	)); ?>
	<?php endif ?>

	<?php if (Yii::app()->user->checkAccess('page_editModule')): ?>
	
	<?php echo $form->dropDownListRow($model, 'modul', array(
		'0'=>'No',
		'1'=>'Yes',
	)); ?>

	<?php echo $form->dropDownListRow($model,'modul_target', Modul::model()->getSelect(),array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'menu_modul',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'icon',CHtml::listData(Icon::model()->findAll(),'img','name'),array('class'=>'span5','maxlength'=>200,'empty'=>'Pilih Icon')); ?>

	<?php echo $form->dropDownListRow($model, 'hide_menu', array(
		'0'=>'No',
		'1'=>'Yes',
	)); ?>

	<?php endif ?>

	<?php /* GAGAL
	<?php $this->widget('application.extensions.uploadify.uploadifyWidget'); ?>
	<div id="fileUpload">You have a problem with your javascript</div>
    <div class='photo_menu'>
        <a href="javascript:startUpload()">Start Upload</a> |  <a href="javascript:$('#fileUpload').fileUploadClearQueue()">Clear Queue</a>
    </div>
    */ ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>
<script type="text/javascript">
	$('#Page_menu_modul').tagit({});
</script>

	<?php if ($model->menu_modul!=''): ?>
		<?php
		$iconMenu = explode(',', $model->menu_modul);
		?>
			<div class="span12">
				<h3>Sub Menu</h3>
				<ul class="thumbnails">
		<?php 
			$pageIll = array();
			foreach ($iconMenu as $k => $v): ?>
			<?php
			$subMenu = MenuBackend::model()->find('url = :url',array(':url'=>$v));
			$subMenuAction = explode('|', $subMenu->action);
			// print_r($subMenu->attributes);
			if ($subMenu->url == 'PageIllustrasi') {
				$urlv = CHtml::normalizeUrl(array('/admin/'.$subMenu->url.'/'.$subMenuAction[0] , 'page'=> $model->id));
			} else {
				$urlv = CHtml::normalizeUrl(array('/admin/'.$subMenu->url.'/'.$subMenuAction[0]));
			}
			?>
					<li class="span2">
						<a href="<?php echo $urlv; ?>" class="thumbnail">
							<div class="thumbnail">
								<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/<?php echo $subMenu->icon ?>" alt="">
								<p class="text-tengah less"><?php echo $subMenu->name ?></p>
							</div>
						</a>
					</li>
		<?php endforeach ?>
				</ul>
			</div>
	<?php endif ?>
<?php $this->endWidget(); ?>
