<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sstatic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php // echo $form->textFieldRow($model,'page',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'metatitle',array('class'=>'span5','maxlength'=>200)); ?>

	<?php // echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>200)); ?>

	<?php //echo $form->textAreaRow($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'desc',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
		'model'=>$model,
		'attribute'=>'desc', // model atribute
		'language'=>'en', /* default lang, If not declared the language of the project will be used in case of using multiple languages */
		'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
		'contentCSS'=>Yii::app()->baseUrl.'/asset/css/text-def2.css',
		)); ?>
		</div>
	</div>


	<?php // echo $form->textFieldRow($model,'img',array('class'=>'span5','maxlength'=>200)); ?>

	<?php // echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>20)); ?>

	<?php // echo $form->textFieldRow($model,'sort',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'metadesc',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'metakey',array('class'=>'span5','maxlength'=>200)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
