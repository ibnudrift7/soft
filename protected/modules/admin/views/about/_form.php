<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'page-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
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

	<?php
	$tabs = array();
	foreach ($modelDesc as $key => $value) {
		$lang = Language::model()->getName($key);
		$tabs[] = array('label'=>$lang->name, 'content'=>
	        $form->textFieldRow($value,'['.$lang->code.']name',array('class'=>'span5','maxlength'=>100)).
	        $form->textAreaRow($value,'['.$lang->code.']content',array('class'=>'span5','maxlength'=>200))
	        , 'active'=>($key=='id')?TRUE:false,
	    );
		$this->widget('application.extensions.extckeditor.ExtCKEditor', array(
			'model'=>$value,
			'attribute'=>'['.$lang->code.']content', // model atribute
			'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
			'return'=>TRUE, // Toolbar settings (full, basic, advanced)
			//'contentCSS'=>Yii::app()->baseUrl.'/asset/images/de_font2.css'
		));
	}
	?>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>$tabs,
	)); ?>
	<?php /*
	<?php echo $form->fileFieldRow($model,'image',
	array('hint'=>'<b>Note:</b> Ukuran gambar adalah 243 x 151px. Gambar yang lebih besar akan terpotong otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/layanan/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif ?>
	*/ ?>
	<?php /*
	<?php $a = '' ?>
	<?php if ($model->scenario == 'update'): ?>
	<?php $a = '<a href="'.Yii::app()->baseUrl.'/images/layanan/'.$model->file.'">Lihat File</a>'; ?>
	<?php endif ?>
	<?php echo $form->fileFieldRow($model,'file',
	array('hint'=>'<b>Note:</b> Ukuran file tidak boleh melebihi 2MB<br>'.$a)); ?>
	*/ ?>

	<?php echo $form->dropDownListRow($model, 'active', array(
		'1'=>'Active',
		'0'=>'Deactive',
	)); ?>

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

<?php $this->endWidget(); ?>
