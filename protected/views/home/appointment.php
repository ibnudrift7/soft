<div class="wfull content-full">
	<div class="container">
		<div class="content-left">
			<div class="text-content">
				<div class="height-40"></div>
				<h1 class="main-title">Make an Appointment</h1>
				<div class="fcs-line"></div>
				<div class="height-10"></div>
				<p>Kami akan membantu mempersiapkan waktu yang terbaik untuk konsultasi Anda, silahkan menggunakan form di bawah ini untuk menginformasikan waktu terbaik konsultasi. </p>
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
	<?php
	$jam = array(
		'7.30'=>'7.30',
		'8.00'=>'8.00',
		'8.30'=>'8.30',
		'9.00'=>'9.00',
		'9.30'=>'9.30',
		'10.00'=>'10.00',
		'10.30'=>'10.30',
		'11.00'=>'11.00',
		'11.30'=>'11.30',
		'12.00'=>'12.00',
		'12.30'=>'12.30',
		'13.00'=>'13.00',
		'13.30'=>'13.30',
		'14.00'=>'14.00',
		'14.30'=>'14.30',
		'15.00'=>'15.00',
		'15.30'=>'15.30',
		'16.00'=>'16.00',
		'16.30'=>'16.30',
		'17.00'=>'17.00',
		'17.30'=>'17.30',
	);
	?>
	<div class="row">
		<div class="span4">
		<div class="control-group ">
			<?php echo $form->labelEx($model,'tanggal1',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php
				    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    // 'name'=>'Reservation[date_add]',
				    'model'=>$model,
				    'attribute'=>'tanggal1',
				    // additional javascript options for the date picker plugin
				    'options'=>array(
				    	'showAnim'=>'fold',
				    	'showOn'=> "button",
						'buttonImage'=> Yii::app()->baseUrl."/asset/images/icon-calender.png",
						'buttonImageOnly'=> true,
				    ),
				    'htmlOptions'=>array(
				    'style'=>'height:20px; width: 125px;'
				    ),
				    ));
				?>
			</div>
		</div>

		<?php echo $form->dropDownListRow($model,'jam1',$jam,array('class'=>'span2')); ?>
		</div>
		<div class="span4 left">
		<div class="control-group ">
			<?php echo $form->labelEx($model,'tanggal2',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php
				    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    // 'name'=>'Reservation[date_add]',
				    'model'=>$model,
				    'attribute'=>'tanggal2',
				    // additional javascript options for the date picker plugin
				    'options'=>array(
				    	'showAnim'=>'fold',
				    	'showOn'=> "button",
						'buttonImage'=> Yii::app()->baseUrl."/asset/images/icon-calender.png",
						'buttonImageOnly'=> true,
				    ),
				    'htmlOptions'=>array(
				    'style'=>'height:20px; width: 125px;'
				    ),
				    ));
				?>
			</div>
		</div>

		<?php echo $form->dropDownListRow($model,'jam2',$jam,array('class'=>'span2')); ?>
		</div>
	</div>

	<?php echo $form->textAreaRow($model,'body',array('class'=>'span5')); ?>

	<div class="control-group ">
		<label for="ContactForm_subject" class="control-label">&nbsp;</label>
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				// 'type'=>'primary',
				'label'=>'Submit',
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