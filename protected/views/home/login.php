<?php
/* @var $this HomeController */
?>
				<div class="content-dalam-header">
					<div class="content-dalam-title">
						Login
					</div>
					<div class="content-dalam-share">
						<div class="content-dalam-share-img">
						<a href="#"><img style="vertical-align:middle" src="<?php echo Yii::app()->baseUrl ?>/asset/images/tombol-facebook.png" /></a>
						</div>
						<div class="content-dalam-share-text">
						<a href="#">Share on Facebook</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="text-content">
				<div class="height-10"></div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
					<?php echo $form->errorSummary($model); ?>

					<div class="contact-cont">
						<div class="height-10"></div>
						<div class="row">
							<div class="form-left">
							<?php echo $form->labelEx($model,'username'); ?>
							</div>
							<div class="form-right">
							<div class="contact-box">
								<div class="inner-box">
									<?php echo $form->textField($model,'username'); ?>
								</div>
							</div>
							<?php echo $form->error($model,'username'); ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="row">
							<div class="form-left">
							<?php echo $form->labelEx($model,'password'); ?>
							</div>
							<div class="form-right" style="width: 271px;">
							<div class="contact-box">
								<div class="inner-box">
									<?php echo $form->textField($model,'password'); ?>
								</div>
							</div>
							<?php echo $form->error($model,'password'); ?>
							<div class="height-10"></div>
							<div class="contact-submit">
								<div class="inner-box">
									<?php echo CHtml::submitButton(''); ?>
								</div>
							</div>
							</div>
							<div class="clear"></div>
							<div class="height-10"></div>
						</div>
						<div class="height-10"></div>
					</div>
					
					<div class="height-20"></div>
<?php $this->endWidget(); ?>
				</div>
				<div class="content-dalam-footer">
					<div class="content-dalam-share">
						<div class="content-dalam-share-img">
						<a href="#"><img style="vertical-align:middle" src="<?php echo Yii::app()->baseUrl ?>/asset/images/tombol-facebook.png" /></a>
						</div>
						<div class="content-dalam-share-text">
						<a href="#">Share on Facebook</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
