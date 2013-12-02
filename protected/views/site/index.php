<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
)); ?>
<h2><?php echo 'Welcome to '.CHtml::encode(Yii::app()->name) ?></h2>

<?php $this->endWidget(); ?>
<?php if (Yii::app()->user->checkAccess('administrator') OR Yii::app()->user->checkAccess('superEditor')): ?>
	
<div class="row">
	<div class="span12">

	<div class="row">
		
		<div class="span6">
		<h3>Main Page</h3>
		<ul class="thumbnails">
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index', 'kat'=>1)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/icon-slidekits-xl.png" alt="">
						<p class="text-tengah less">Slide</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/banner/index', 'kat'=>1)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/advertising.png" alt="">
						<p class="text-tengah less">Banner</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/setting/index', 'kat'=>1)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/gear.png" alt="">
						<p class="text-tengah less">Setting</p>
					</div>
				</a>
			</li>
			
		</ul>
		</div>

		<div class="span6">
			
			<h3>Reservation</h3>
			<ul class="thumbnails">
				<li class="span2">
					<a href="<?php echo CHtml::normalizeUrl(array('/admin/reservation/index')) ?>" class="thumbnail">
						<div class="thumbnail">
							<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/cutie_icon_set_preview_06.jpg" alt="">
							<p class="text-tengah less">Booking List</p>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="<?php echo CHtml::normalizeUrl(array('/admin/stock/index')) ?>" class="thumbnail">
						<div class="thumbnail">
							<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/Door.png" alt="">
							<p class="text-tengah less">Stock Rooms</p>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="<?php echo CHtml::normalizeUrl(array('/admin/member/index')) ?>" class="thumbnail">
						<div class="thumbnail">
							<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/members.png" alt="">
							<p class="text-tengah less">Member</p>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>


		<h3>Pages</h3>
		<ul class="thumbnails">
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/page/update', 'id'=>1)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/cutie_icon_set_preview_02.jpg" alt="">
						<p class="text-tengah less">About Us</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/page/update', 'id'=>2)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/icon-building.jpg" alt="">
						<p class="text-tengah less">Room & Rates</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/page/update', 'id'=>3)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/gatheringgrounds-coffee-icon.png" alt="">
						<p class="text-tengah less">Restaurant</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/page/update', 'id'=>4)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/icon-star.png" alt="">
						<p class="text-tengah less">Facilities</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/page/update', 'id'=>5)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/cutie_icon_set_preview_19.jpg" alt="">
						<p class="text-tengah less">Promotions</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/page/update', 'id'=>6)) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/location-1.png" alt="">
						<p class="text-tengah less">Location</p>
					</div>
				</a>
			</li>
		</ul>
	</div>
</div>
<?php endif ?>


