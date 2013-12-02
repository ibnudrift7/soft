<div class="wfull content-full">
	<div class="container">
		<div class="content-left">
			<div class="text-content">
				<div class="height-40"></div>
				<h1 class="main-title">Search</h1>
				<div class="fcs-line"></div>
				<div class="height-10"></div>
				<p>Search "<?php echo $_GET['search'] ?>" Result <?php echo count($model) ?></p>
				<div class="search-container">
					<?php foreach ($model as $key => $value): ?>
					<div class="search-list">
						<?php if ($value['img']!=''): ?>
						<div class="search-image">
							<a href=""><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, $value['img'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt=""></a>
						</div>
						<?php endif ?>
						<?php if ($value['img']!=''): ?>
						<div class="search-text">
						<?php else: ?>
						<div class="search-text2">
						<?php endif ?>
							<div class="search-title"><a href="<?php echo $value['link'] ?>"><?php echo $value['title'] ?></a></div>
							<div class="search-description">
								<?php echo substr(strip_tags($value['desc']), 0, 200) ?>
							</div>
							<div class="search-link"><a href="<?php echo $value['link'] ?>"><?php echo $value['link'] ?></a></div>
						</div>
						<div class="clear"></div>
					</div>
					<?php endforeach ?>
				</div>

			</div>
		</div>
		<div class="text-content menu-left-container">
			<div class="menu-left-shad-l"></div>
			<div class="menu-left-shad-r"></div>
			<div class="padding-20">
				<div class="height-35"></div>
				<?php echo $this->renderPartial('//layouts/_contact') ?>
				<h6>Opening Hours</h6>
				<div class="menu-left-line"></div>
				<div class="height-10"></div>
				<p>
					<?php echo nl2br($this->setting['open']) ?>
				</p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>