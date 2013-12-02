<?php
$this->pageTitle = $data['title'].' - '.$this->pageTitle;
?>
<div class="wfull content-full">
	<div class="container">
		<div class="content-left">
			<div class="text-content">
				<div class="height-40"></div>
				<h1 class="main-title"><?php echo $data['title'] ?></h1>
				<div class="fcs-line"></div>
				<div class="height-10"></div>
				<?php echo $data['content'] ?>
				<div class="height-10"></div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'artikel-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'class' => 'form-frontend'
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="height-10"></div>
	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'how',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'subject',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'body',array('class'=>'span5')); ?>
	<div class="control-group ">
		<label for="ContactForm_verifyCode" class="control-label">&nbsp;</label>
		<div class="controls">
			<?php $this->widget('CCaptcha', array(
				'imageOptions'=>array(
					'style'=>'margin-bottom: 0px; margin-right: 10px;',
				),
			)); ?>
		</div>
	</div>
	<?php echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>

	<div class="control-group ">
		<label for="ContactForm_subject" class="control-label">&nbsp;</label>
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				// 'type'=>'primary',
				'label'=>Yii::t('main','Send Message'),
			)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

			</div>
		</div>
		<div class="text-content menu-left-container">
			<div class="menu-left-shad-l"></div>
			<div class="menu-left-shad-r"></div>
			<div class="padding-20">
				<div class="height-35"></div>
				<?php echo $this->renderPartial('//layouts/_contact') ?>
				<h6><?php echo Yii::t('main', 'Opening Hours') ?></h6>
				<div class="menu-left-line"></div>
				<div class="height-10"></div>
				<?php echo ($this->setting['open']) ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>