<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'slide-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		$tabs[] = array('label'=>$lang->name, 'content'=>
	        // $form->textFieldRow($value,'['.$lang->code.']desc',array('class'=>'span5','maxlength'=>100))
	        $form->textFieldRow($value,'['.$lang->code.']desc',array('class'=>'span5','maxlength'=>200))
	        , 'active'=>($key=='id')?TRUE:false,
	    );
		// $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
		// 	'model'=>$value,
		// 	'attribute'=>'['.$lang->code.']content', // model atribute
		// 	'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
		// 	'return'=>TRUE, // Toolbar settings (full, basic, advanced)
		// 	//'contentCSS'=>Yii::app()->baseUrl.'/asset/images/de_font2.css'
		// ));
	}
	?>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>$tabs,
	)); ?>

    <div class="control-group ">
		<?php echo $form->hiddenField($model,'image') ?>
		<input type="hidden" id="x" name="Position[x]" value="<?php echo $model->picture->x; ?>" />
		<input type="hidden" id="y" name="Position[y]" value="<?php echo $model->picture->y; ?>" />
		<input type="hidden" id="w" name="Position[w]" value="<?php echo $model->picture->w; ?>" />
		<input type="hidden" id="h" name="Position[h]" value="<?php echo $model->picture->h; ?>" />
    	<?php echo $form->labelEx($model, 'image', array('class'=>'control-label')) ?>
    	<div class="controls">
    	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/fileupload/css/jquery.fileupload-ui.css'); ?>
    	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/jcrop/css/jquery.Jcrop.css'); ?>
		<!-- <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/css/jquery.fileupload-ui.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/asset/js/jcrop/css/jquery.Jcrop.css" type="text/css" /> -->

		<div class="upload-filenya">
		    <span class="btn btn-success fileinput-button">
		        <i class="icon-plus icon-white"></i>
		        <span>Select files...</span>
		        <!-- The file input field used as target for the file upload widget -->
		        <input id="fileupload" type="file" name="Slide[image]">
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
			<img src="<?php echo Yii::app()->baseUrl ?>/images/slide/large/<?php echo $model->image.'?'.md5(time()+rand()) ?>" class="crop-image">
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
		<!-- JCROP -->
		<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/asset/js/jcrop/js/jquery.Jcrop.min.js', CClientScript::POS_HEAD); ?>
		<!-- <script src="<?php echo Yii::app()->baseUrl ?>/asset/js/jcrop/js/jquery.Jcrop.min.js"></script> -->

		<!-- Drag n Drop Upload -->
		<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/asset/js/fileupload/js/vendor/jquery.ui.widget.js', CClientScript::POS_HEAD); ?>
		<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/asset/js/fileupload/js/jquery.iframe-transport.js', CClientScript::POS_HEAD); ?>
		<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/asset/js/fileupload/js/jquery.fileupload.js', CClientScript::POS_HEAD); ?>
		<!-- <script src="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/js/vendor/jquery.ui.widget.js"></script>
		<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/js/jquery.iframe-transport.js"></script>
		<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/fileupload/js/jquery.fileupload.js"></script> -->


		<!-- Drag n Drop Upload SCRIP -->
		<script>
		/*jslint unparam: true */
		/*global window, $ */
		var jcrop_api;
		var status_load_crop = 0;
		$(document).ready(function(){
		    // 'use strict';


		    // Change this to the location of your server-side upload handler:
		    var url = '<?php echo CHtml::normalizeUrl(array('/admin/slide/upload')) ?>';
		    $('#fileupload').fileupload({
		        url: url,
		        dataType: 'json',
		        done: function (e, data) {
	                // $('<p/>').text(data.result.name).appendTo('#files');
	                // $('.crop-image').attr('src', data.result.fullpath);
	                jcrop_api.setImage(data.result.fullpath);
	                $('.upload-filenya').hide();
	                $('.crop-filenya').show();
	                $('#Slide_image').val(data.result.name);
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
				// setTimeout( 'initJcrop()', 500 );
				initJcrop();
		});


		    // JCrop
			function initJcrop()//{{{
		    {
		      // Invoke Jcrop in typical fashion
		      $('.crop-image').Jcrop({
		        onRelease: releaseCheck,
		    	onSelect: updateCoords,
		    	aspectRatio: 850 / 507
		      },function(){
		      	status_load_crop = 1;
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
    	</div>
    </div>
	<?php //echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>225)); ?>

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
