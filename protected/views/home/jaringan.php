<?php
/* @var $this HomeController */
?>
				<div class="content-dalam-header">
					<div class="content-dalam-title">
						Jaringan Rekan
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
					<p>Cahaya Medika Healthcare memiliki jaringan rekan yang tersebar di Indonesia, silahkan mencari lokasi jaringan rekan kami yang
terdekat dengan lokasi Anda.</p>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>false,
)); ?>
				<div class="infohome">
					<div class="fleft span-6 margin-right-5">
						<?php echo $form->labelEx($model,'prov'); ?>
<?php
$jqcs = $this->createWidget('application.extensions.jqchain.jqchain');
?>
						<div class="select-box">
							<div class="inner-box">
								<?php
								$dataProv2['All']='Semua Provinsi';
								$dataProv = cHtml::listData(MasterState::model()->findAll(),'state_id','state_name');
								foreach ($dataProv as $key => $value) {
									$dataProv2[$key]=$value;
								}
								echo $jqcs->mainDropDown('IDnya[prov]', '', 
								$dataProv2,
								array('empty'=>'---------- Pilih Propinsi ----------'), 
								'/home/getData','IDnya[kota]');
								 ?>
								 ?>
							</div>
						</div>
					</div>
					<div class="fleft span-6 margin-right-5">
						<?php echo $form->labelEx($model,'kota'); ?>
						<div class="select-box">
							<div class="inner-box">
								<?php
								echo $jqcs->mainDropDown('IDnya[kota]', '', 
								array(),
								array('empty'=>'---------- Pilih Kota ----------'), 
								'/home/getData');
								?>
							</div>
						</div>
					</div>
					<div class="jaringan-button">
						<div class="button-box">
							<div class="inner-box">
								<?php echo CHtml::submitButton(''); ?>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
<?php $this->endWidget(); ?>
				<div class="height-20"></div>
				<div class="content-dalam-header">
					<div class="content-dalam-title">
						Jaringan Rekan berdasar kota
					</div>
					<div class="clear"></div>
					<div class="height-10"></div>
				</div>
				<div class="height-10"></div>
					<?php
					$this->widget('zii.widgets.CMenu', array(
						'items'=>array(
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
							array('label'=>'Jakarta', 'url'=>array('/home/lokasi', 'kota'=>'jakarta')),
							array('label'=>'Surabaya', 'url'=>array('/home/lokasi', 'kota'=>'surabaya')),
							array('label'=>'Jogjakarta', 'url'=>array('/home/lokasi', 'kota'=>'jogjakarta')),
							array('label'=>'Solo', 'url'=>array('/home/lokasi', 'kota'=>'solo')),
							array('label'=>'Medan', 'url'=>array('/home/lokasi', 'kota'=>'medan')),
							array('label'=>'Denpasar', 'url'=>array('/home/lokasi', 'kota'=>'denpasar')),
						),
						'htmlOptions'=>array('class'=>'jaringan-list'),
					));
					?>
					<div class="clear"></div>
					<div class="height-10"></div>
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
