<?php
$this->breadcrumbs=array(
	'Page Illustrasis',
);

	// $cek = false;
	// $v_cek = PageIllustrasi::Model()->getLesOne( $_GET[$this->varGet] );
	// echo $v_cek;
	// if ($v_cek == true) {
	// 	$cek = true;
	// }

	// if ($cek==false) {
		$this->menu=array(
		 		array('label'=>'Add PageIllustrasi', 'icon'=>'th-list','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
			);
	// } else {
	// 	$this->menu = array();
		
	// }
	
	

?>

<h1>Page Illustrasis</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'page-illustrasi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'page_id',
		// 'images',
		array(
			'name'=>'images',
			'filter'=>false,
			'type'=>'image',
			'value'=>'PageIllustrasi::model()->getImage($data)',
		),
		
		// array(
		// 	'name'=>'active',
		// 	'value'=> '( trim($data->active == 1) )? "actived": "non active" ',
		// 	),
		// array(
		// 	'header'=>'sort',
		// 	'type'=>'raw',
		// 	'value'=>'SortOrder::sortButton($data,"'.$this->id.'","PageIllustrasi")',
		// ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/pageIllustrasi/delete", array("id" => $data->id, "'.$this->varGet.'" => $data->'.$this->varFk.'))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/pageIllustrasi/update", array("id" => $data->id, "'.$this->varGet.'" => $data->'.$this->varFk.'))',
		),
	),
)); ?>
