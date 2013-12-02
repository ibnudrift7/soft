<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'menu-backend-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>
	<?php echo $form->dropDownListRow($model,'parent',MenuBackend::model()->getMenu(),array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'desc',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'action',array('class'=>'span5','maxlength'=>250)); ?>
	
	<?php echo $form->textFieldRow($model,'sub_action',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'get',array('class'=>'span5','maxlength'=>200)); ?>
	
	<?php echo $form->dropDownListRow($model,'icon',CHtml::listData(Icon::model()->findAll(),'img','name'),array('class'=>'span5','maxlength'=>200,'empty'=>'Pilih Icon')); ?>

	<?php echo $form->radioButtonListRow($model,'shortcut',array(0=>'Deactived',1=>'Actived')); ?>

	<?php echo $form->radioButtonListRow($model,'hidden',array(0=>'Deactived',1=>'Actived')); ?>

	<?php echo $form->radioButtonListRow($model,'active',array(0=>'Deactived',1=>'Actived')); ?>

	<?php echo $form->radioButtonListRow($model,'position',array(0=>'left',1=>'right')); ?>

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
