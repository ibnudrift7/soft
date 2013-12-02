<li class="span2">
	<div class="thumbnail">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,250, '/images/gallery/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		<p class="text-tengah less">
			<?php echo CHtml::link('<i class="icon-pencil"></i>', array('/admin/gallery/update', "id" => $data->id, $this->varGet=>$data->{$this->varFk}, 'iframe'=>$_GET['iframe'])) ?>
			<?php echo CHtml::link('<i class="icon-trash"></i>', array('/admin/gallery/delete', "id" => $data->id, $this->varGet=>$data->{$this->varFk}, 'iframe'=>$_GET['iframe']), array('class'=>'deleteTombol')) ?>
			<?php //echo MenuFcs::model()->sortButton($data,$this->id,$this->varGet,$this->varFk) ?>
		</p>
	</div>
</li>
