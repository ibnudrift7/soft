<?php
$this->widget('application.extensions.fancyapps.EFancyApps', array(
	'target'=>'.fancybox',
));
?>

				<div class="content-dalam-header">
					<div class="content-dalam-title">
						<?php echo $konten['title'] ?>
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
					<?php echo $konten['content'] ?>
					<div class="event-cont">
						<?php foreach ($konten['images'] as $key => $value): ?>
						<div class="event-pic">
							<div class="inner-box">
								<a href="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(640,480, '/images/gallery/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" class="fancybox" rel="gallery1"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(170,121, '/images/gallery/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"  /></a>
							</div>
						</div>
						<?php endforeach ?>

						<div class="clear"></div>
					</div>
					<div class="height-20"></div>

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
