<?php
$this->breadcrumbs=array(
	'Galleries',
);

$this->menu=array(
	array('label'=>'Add Gallery', 'icon'=>'th-list','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>
<style>
.clear{
	clear: both;
}
.pager{
	clear: both;
}
</style>
<h1>Galleries</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
    'dataProvider'=>$dataProvider,
    //'template'=>"{items}\n{pager}",
    'itemView'=>'_view',
)); ?>
<?php /*
<div class="list-view">
	<div class="items">
		<ul class="thumbnails">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'htmlOptions'=>array(
		'style'=>'clear: both',
	),
	'itemsCssClass'=>'clear items',
)); ?>
<div style="clear: both;"></div>
		</ul>
	</div>
</div>
*/ ?>
<script type="text/javascript">
$(document).on('click','a.deleteTombol',function() {
	if(!confirm('Are you sure you want to delete this item?')) return false;
	var th=this;
	var afterDelete=function(){};
	$.ajax({
		type:'POST',
		url:$(this).attr('href'),
		success:function(data) {
			document.location.reload(true)
		},
		error:function(XHR) {
			document.location.reload(true)
		}
	});
	return false;
});
</script>




