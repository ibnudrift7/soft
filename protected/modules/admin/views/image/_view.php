<li class="span2">
	<div class="thumbnail">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(170,130, '/images/image/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		<p class="text-tengah less">
			<?php echo CHtml::link('<i class="icon-pencil"></i>', array('/admin/image/update', "id" => $data->id, $this->varGet=>$data->{$this->varFk})) ?>
			<?php echo CHtml::link('<i class="icon-trash"></i>', array('/admin/image/delete', "id" => $data->id, $this->varGet=>$data->{$this->varFk}), array('class'=>'deleteTombol')) ?>
			<?php echo Image::model()->sortButton($data,$this->id,$this->varGet,$this->varFk) ?>
		</p>
	</div>
</li>
