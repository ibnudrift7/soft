<div class="wfull content-full">
	<div class="container">
		<div class="content-left">
			<div class="text-content">
				<div class="height-40"></div>
				<h1 class="main-title">Contact Us</h1>
				<div class="fcs-line"></div>
				<div class="height-10"></div>
				<p>Untuk informasi atau pertanyaan lebih lanjut, silahkan mengisi form di bawah ini. Kami akan segera merespon segala pertanyaan Anda. </p>
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
		<label for="ContactForm_subject" class="control-label">&nbsp;</label>
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				// 'type'=>'primary',
				'label'=>'Send Message',
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
				<h6>Apakah Anda perlu Bantuan?</h6>
				<div class="menu-left-line"></div>
				<div class="height-10"></div>
			    <dl class="dl-horizontal">
				    <dt><i class="icon-telp"></i></dt>
				    <dd>(62 31) 732 3366</dd>
				    <dt><i class="icon-mail"></i></dt>
				    <dd><a href="mailto:info@bethesdaclinic.com">info@bethesdaclinic.com</a></dd>
				    <dt><i class="icon-flag"></i></dt>
				    <dd>Spazio 2nd fl. Graha Family Surabaya</dd>
			    </dl>
				<h6>Opening Hours</h6>
				<div class="menu-left-line"></div>
				<div class="height-10"></div>
				<p>
					Monday to Friday - 7.30am - 6pm <br>
					Saturday - 7am - 12.30pm <br>
					Sunday - Closed <br>
				</p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>