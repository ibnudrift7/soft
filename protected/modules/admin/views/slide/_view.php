<?php
$data->image = json_decode($data->image);
?>
<li class="span2">
	<div class="thumbnail">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,250, '/images/slide/'.$data->image->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		<p class="text-tengah less">
			<?php echo CHtml::link('<i class="icon-pencil"></i>', array('update', "id" => $data->id)) ?>
			<?php echo CHtml::link('<i class="icon-trash"></i>', array('delete', "id" => $data->id), array('class'=>'deleteTombol')) ?>
			<?php echo SortOrder::sortButton($data,$this->id,"Slide") ?>
		</p>
	</div>
</li>
