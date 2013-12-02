<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'artikel-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data', 'onsubmit'=>'return checkCoords();'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php 
	foreach ($modelDesc as $key => $value): 
		echo $form->errorSummary($value); 
	endforeach
	?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>
	<?php	$tabs = array();
	foreach ($modelDesc as $key => $value) {
		$lang = Language::model()->getName($key);
		// if ($key=='en') {
			$tabs[] = array('label'=>$lang->name, 'content'=>
		        $form->textFieldRow($value,'['.$lang->code.']title',array('class'=>'span5','maxlength'=>100)).
		        $form->textAreaRow($value,'['.$lang->code.']content',array('class'=>'span5','maxlength'=>200))
		        , 'active'=>($key=='id')?TRUE:false,
		    );
			$this->widget('application.extensions.extckeditor.ExtCKEditor', array(
				'model'=>$value,
				'attribute'=>'['.$lang->code.']content', // model atribute
				'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
				'return'=>TRUE, // Toolbar settings (full, basic, advanced)
				'contentCSS'=>Yii::app()->baseUrl.'/asset/css/styles-text.css',
			));
		// }
	}
	?>
	<?php echo $form->textFieldRow($model,'writer',array('class'=>'span5','maxlength'=>100)) ?>

	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>$tabs,
	)); ?>
	
	<?php /*
	<?php echo $form->fileFieldRow($model,'image',
	array('hint'=>'<b>Note:</b> Ukuran gambar adalah width 249. Gambar yang lebih besar akan terpotong otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/artikel/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif ?>
	*/ ?>
    <div class="control-group ">
		<?php echo $form->hiddenField($model,'image') ?>
		<input type="hidden" id="x" name="Position[x]" value="<?php echo $model->picture->x; ?>" />
		<input type="hidden" id="y" name="Position[y]" value="<?php echo $model->picture->y; ?>" />
		<input type="hidden" id="w" name="Position[w]" value="<?php echo $model->picture->w; ?>" />
		<input type="hidden" id="h" name="Position[h]" value="<?php echo $model->picture->h; ?>" />
    	<?php echo $form->labelEx($model, 'image', array('class'=>'control-label')) ?>
    	<div class="controls">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/css/jquery.fileupload-ui.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/asset/js/jcrop/css/jquery.Jcrop.css" type="text/css" />

		<div class="upload-filenya">
		    <span class="btn btn-success fileinput-button">
		        <i class="icon-plus icon-white"></i>
		        <span>Select files...</span>
		        <!-- The file input field used as target for the file upload widget -->
		        <input id="fileupload" type="file" name="Artikel[image]">
		    </span>
		    <br>
		    <br>
		    <!-- The global progress bar -->
		    <div id="progress" class="progress progress-success progress-striped">
		        <div class="bar"></div>
		    </div>
		    <?php if ($model->scenario == 'update'): ?>
		    <?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'link',
				'type'=>'primary',
				'label'=>'Cancel',
				'htmlOptions'=>array('class'=>'change-image-cancel'),
			)); ?>
		    <?php endif ?>
		</div>
		<div class="crop-filenya">
			<?php if ($model->scenario == 'update'): ?>
			<img src="<?php echo Yii::app()->baseUrl ?>/images/artikel/large/<?php echo $model->image.'?'.md5(time()+rand()) ?>" class="crop-image">
			<?php else: ?>
			<img src="<?php echo Yii::app()->baseUrl ?>/images/not-available.jpg" class="crop-image">
			<?php endif ?>
		    <br>
		    <?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'link',
				'type'=>'primary',
				'label'=>'Change Image',
				'htmlOptions'=>array('class'=>'change-image'),
			)); ?>
		</div>

		<!-- Drag n Drop Upload -->
		<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/js/vendor/jquery.ui.widget.js"></script>
		<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/js/jquery.iframe-transport.js"></script>
		<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/js/jquery.fileupload.js"></script>

		<!-- JCROP -->
		<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/jcrop/js/jquery.Jcrop.min.js"></script>

		<!-- Drag n Drop Upload SCRIP -->
		<script>
		/*jslint unparam: true */
		/*global window, $ */
		$(document).ready(function(){
			var jcrop_api;
			initJcrop();
		    'use strict';
		    // Change this to the location of your server-side upload handler:
		    var url = '<?php echo CHtml::normalizeUrl(array('/admin/artikel/upload')) ?>';
		    $('#fileupload').fileupload({
		        url: url,
		        dataType: 'json',
		        done: function (e, data) {
	                // $('<p/>').text(data.result.name).appendTo('#files');
	                // $('.crop-image').attr('src', data.result.fullpath);
	                jcrop_api.setImage(data.result.fullpath);
	                $('.upload-filenya').hide();
	                $('.crop-filenya').show();
	                $('#Artikel_image').val(data.result.name);
					<?php if ($model->scenario == 'update'): ?>
					jcrop_api.animateTo([					
						$('#x').val(),
						$('#y').val(),
						$('#x').val()*1+$('#w').val()*1,
						$('#y').val()*1+$('#h').val()*1
					]);
					<?php endif ?>
		        },
		        progressall: function (e, data) {
		            var progress = parseInt(data.loaded / data.total * 100, 10);
		            $('#progress .bar').css(
		                'width',
		                progress + '%'
		            );
		        }
		    }).prop('disabled', !$.support.fileInput)
		        .parent().addClass($.support.fileInput ? undefined : 'disabled');

		    // JCrop
			function initJcrop()//{{{
		    {
		      // Invoke Jcrop in typical fashion
		      $('.crop-image').Jcrop({
		        onRelease: releaseCheck,
		    	onSelect: updateCoords,
		    	aspectRatio: 499 / 295
		      },function(){

		        jcrop_api = this;
				<?php if ($model->scenario == 'update'): ?>
				jcrop_api.animateTo([					
					$('#x').val(),
					$('#y').val(),
					$('#x').val()*1+$('#w').val()*1,
					$('#y').val()*1+$('#h').val()*1
				]);
				$('.upload-filenya').hide();
				<?php else: ?>
		    	jcrop_api.disable();
		    	$('.upload-filenya').show();
		    	$('.crop-filenya').hide();
				<?php endif ?>

		      });

		    };

		    function releaseCheck()
		    {
		      jcrop_api.setOptions({ allowSelect: true });
		      $('#can_click').attr('checked',false);
		    };

		    $('.change-image').live('click',function(){
		    	$('.upload-filenya').slideDown();
		    	$('.crop-filenya').slideUp();
		    })
		    $('.change-image-cancel').live('click',function(){
		    	$('.upload-filenya').slideUp();
		    	$('.crop-filenya').slideDown();
		    })

		});

		function updateCoords(c)
		{
		    $('#x').val(c.x);
		    $('#y').val(c.y);
		    $('#w').val(c.w);
		    $('#h').val(c.h);
		};

		function checkCoords()
		{
		    if (parseInt($('#w').val())) return true;
		    alert('Please select a crop region then press submit.');
		    return false;
		};

		</script>
    	<?php /*
		<?php $this->widget('ext.dropzone.EDropzone', array(
		    'model' => $model,
		    'attribute' => 'image',
		    'url' => $this->createUrl('/admin/artikel/upload'),
		    'mimeTypes' => array('image/jpeg', 'image/png'),
		    'onSuccess' => '
				msg = JSON.parse(msg);
				if (msg.msg=="ok") {
					$("#fileup").hide();
					$("#fileshow img").attr("src", msg.fullpath);
					$("#Artikel_image").val(msg.name);
					$("#imageId").val(msg.fullpath);
					
						// ejcrop_initWithButtons(
						// 	"imageId", 
						// 	{
						// 		"minSize":[249,352],
						// 		"aspectRatio":249/352,
						// 		"onRelease":function() {
						// 			ejcrop_cancelCrop(this);
						// 		},
						// 		"onChange":function(c) {
						// 			ejcrop_getCoords(c,"imageId"); 
						// 			ejcrop_showThumb(c,"imageId");
						// 		},
						// 		"ajaxUrl":"'.CHtml::normalizeUrl(array('/admin/artikel/ajaxResize')).'",
						// 		"ajaxParams":{"picture":null},
						// 	}
						// );
					

					$("#fileshow").show();
				}
				$(".dz-preview").remove();
				$(".dz-started").removeClass("dz-started");
		    ',
		    'options' => array(
		    	'uploadMultiple'=>false,
		    ),
		)); ?>
		<div id="fileshow" style="display: none;">
			<?php $this->widget('ext.jcrop.EJcrop', array(
			    //
			    // Image URL
			    'url' => $this->createAbsoluteUrl('/images/artikel/large/'.$model->image),
			    //
			    // ALT text for the image
			    'alt' => 'Crop This Image',
			    //
			    // options for the IMG element
			    'htmlOptions' => array('id' => 'imageId'),
			    //
			    // Jcrop options (see Jcrop documentation)
			    'options' => array(
			        'minSize' => array(249, 352),
			        'aspectRatio' => 249/352,
			        'onRelease' => "js:function() {ejcrop_cancelCrop(this);}",
			    ),
			    // if this array is empty, buttons will not be added
			    'buttons' => array(
			        'start' => array(
			            'label' => Yii::t('promoter', 'Adjust thumbnail cropping'),
			            'htmlOptions' => array(
			                'class' => 'btn',
			            )
			        ),
			        'crop' => array(
			            'label' => Yii::t('promoter', 'Apply cropping'),
			            'htmlOptions' => array(
			                'class' => 'btn',
			            )
			        ),
			        'cancel' => array(
			            'label' => Yii::t('promoter', 'Cancel cropping'),
			            'htmlOptions' => array(
			                'class' => 'btn',
			            )
			        )
			    ),
			    // URL to send request to (unused if no buttons)
			    'ajaxUrl' => $this->createUrl('/admin/artikel/ajaxResize'),
			    //
			    // Additional parameters to send to the AJAX call (unused if no buttons)
			    'ajaxParams' => array('image_width' => '249', 'image_height' => '352'),
			)); ?>
			<div style="height: 10px;"></div>
			<a href="#" class="btn btn-primary" id="ganti-gambar">Ganti Gambar</a>
		</div>
		<script type="text/javascript">
// jQuery('#imageId').Jcrop({
// 	'minSize':[50,50],
// 	'aspectRatio':1,
// 	'onRelease':function() {ejcrop_cancelCrop(this);},
// 	'onChange':function(c) {
// 		ejcrop_getCoords(c,'imageId'); 
// 		ejcrop_showThumb(c,'imageId');
// 	},
// 	'ajaxUrl':null,'ajaxParams':[]
// });

// $(document).ready(function(){
// 	ejcrop_initWithButtons(
// 		'imageId', 
// 		{
// 			'minSize':[50,50],
// 			'aspectRatio':1,
// 			'onRelease':function() {
// 				ejcrop_cancelCrop(this);
// 			},
// 			'onChange':function(c) {
// 				ejcrop_getCoords(c,'imageId'); 
// 				ejcrop_showThumb(c,'imageId');
// 			},
// 			'ajaxUrl':null,
// 			'ajaxParams':[]
// 		}
// 	);
// })

			$('#ganti-gambar').live('click', function(){
				$("#fileshow").hide();
				$("#fileup").show();
				return false;
			})
			<?php if ($model->scenario == 'update'): ?>
				$("#fileup").hide();
				$("#fileshow").show();
			<?php else: ?>
				$("#fileshow").hide();
				$("#fileup").show();
			<?php endif ?>
		</script>
		*/ ?>
    	</div>
    </div>


	<?php echo $form->dropDownListRow($model, 'active', array(
		'1'=>'Active',
		'0'=>'Deactive',
	)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
