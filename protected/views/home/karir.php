<?php
/* @var $this HomeController */
?>
				<div class="content-dalam-header">
					<div class="content-dalam-title">
						Karir
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
					<h3>Ingin bergabung bersama kami?</h3>

					<p>Mari bergabung bersama kami dan ciptakan jalan menuju masa depan Anda. Kami tidak pernah berhenti merekrut kandidat yang kreatif, berpengalaman dan memiliki kemampuan yang tinggi. Upload CV anda di bawah ini, mungkin Anda adalah kandidat yang kami cari.</p>
					<div class="lokasi-warp">
						<div class="lokasi-list">
							<div class="lokasi-kota">
								Kantor Pusat
							</div>
							<div class="lokasi-alamat">
								<b>Jakarta</b></br>
								Jl. Diponegoro 112, Surabaya.</br>
								<span>(klik <a href="#">di sini</a> untuk melihat peta)</span></br>
								</br>
								Phone: 1800 655 876</br>
								Fax: 1300 788 786 </br>
								E-Mail: <a href="mailto:surabaya@cahayamedika.com">surabaya@cahayamedika.com</a></br>
							</div>
						</div>
						<div class="lokasi-list">
							<div class="lokasi-kota">
								Kantor Perwakilan Utama
							</div>
							<div class="lokasi-alamat">
								<b>Surabaya</b></br>
								Jl. Diponegoro 112, Surabaya.</br>
								<span>(klik <a href="#">di sini</a> untuk melihat peta)</span></br>
								</br>
								Phone: 1800 655 876</br>
								Fax: 1300 788 786 </br>
								E-Mail: <a href="mailto:surabaya@cahayamedika.com">surabaya@cahayamedika.com</a></br>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="content-dalam-header">
						<div class="content-dalam-title">
							Feed Back
						</div>
						<div class="clear"></div>
						<div class="height-10"></div>
					</div>
					<div class="height-10"></div>
					<p>Mari bergabung bersama kami dan ciptakan jalan menuju masa depan Anda. Kami tidak pernah berhenti merekrut kandidat yang kreatif, berpengalaman dan memiliki kemampuan yang tinggi. Upload CV anda di bawah ini, mungkin Anda adalah kandidat yang kami cari.</p>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
					<?php echo $form->errorSummary($model); ?>

					<div class="contact-label">About You</div>
					<div class="contact-cont">
						<div class="height-10"></div>
						<div class="row">
							<div class="form-left">
							<?php echo $form->labelEx($model,'name'); ?>
							</div>
							<div class="form-right">
							<div class="contact-box">
								<div class="inner-box">
									<?php echo $form->textField($model,'name'); ?>
								</div>
							</div>
							<?php echo $form->error($model,'name'); ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="row">
							<div class="form-left">
							<?php echo $form->labelEx($model,'email'); ?>
							</div>
							<div class="form-right">
							<div class="contact-box">
								<div class="inner-box">
									<?php echo $form->textField($model,'email'); ?>
								</div>
							</div>
							<?php echo $form->error($model,'email'); ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="height-10"></div>
					</div>
					
					<div class="height-20"></div>
					
					<div class="contact-cont">
						<div class="height-10"></div>
						<div class="row">
							<div class="form-left">
							<?php echo $form->labelEx($model,'telp'); ?>
							</div>
							<div class="form-right">
							<div class="contact-box">
								<div class="inner-box">
									<?php echo $form->textField($model,'telp'); ?>
								</div>
							</div>
							<?php echo $form->error($model,'telp'); ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="row">
							<div class="form-left">
							<?php echo $form->labelEx($model,'cv'); ?>
							</div>
							<div class="form-right">
							<div class="blank-box">
								<div class="inner-box">
									<?php echo $form->fileField($model,'cv'); ?>
								</div>
							</div>
							<?php echo $form->error($model,'cv'); ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="height-10"></div>
					</div>

					<div class="height-20"></div>

					<div class="contact-label">Your Message</div>
					<div class="contact-cont">
						<div class="height-10"></div>
						<div class="row">
							<div class="form-left">
							<?php echo $form->labelEx($model,'body'); ?>
							</div>
							<div class="form-right">
							<div class="contact-textarea">
								<div class="inner-box">
									<?php echo $form->textArea($model,'body'); ?>
								</div>
							</div>
							<?php echo $form->error($model,'body'); ?>
							<div class="height-10"></div>
							<div class="contact-submit">
								<div class="inner-box">
									<?php echo CHtml::submitButton(''); ?>
								</div>
							</div>
							</div>
							<div class="clear"></div>
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
