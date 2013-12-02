<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'fcs-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>
	
	<?php echo $form->fileFieldRow($model,'images',
	array('hint'=>'<b>Note:</b> Ukuran gambar adalah 707 x 505px. Gambar yang lebih besar akan terpotong otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/fcs/'.$model->images , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif ?>
	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>250,
	'hint'=>'<b>Note:</b> Ini adalah tujuan ketika banner anda diklik')); ?>

	<?php // echo $form->textFieldRow($model,'sort',array('class'=>'span1')); ?>

	<?php echo $form->dropDownListRow($model, 'active', array(
		'y'=>'Active',
		'n'=>'Deactive',
	)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
