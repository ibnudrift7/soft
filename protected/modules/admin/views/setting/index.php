<?php
$this->breadcrumbs=array(
	'Settings',
);

$this->menu=array(
	// array('label'=>'Add Setting', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>
<h1>Edit Setting <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php $tabs = array(); ?>
	<?php foreach ($model as $key => $value): ?>
		<?php if ($value['data']->dual_language=='y'): ?>
		<?php
		foreach ($value['desc'] as $k => $v) {
			$lang = Language::model()->getName($k);
			if ($value['data']->type=='textarea') {
				$textField = CHtml::textArea('Setting['.$value['data']->name.']['.$lang->code.']', $v->value, array('class'=>'span5'));
			} elseif($value['data']->type=='ckeditor') {
				$textField = CHtml::textArea('Setting['.$value['data']->name.']['.$lang->code.']', $v->value, array('class'=>'span5'));
				$this->widget('application.extensions.extckeditor.ExtCKEditor', array(
					'name'=>'Setting['.$value['data']->name.']['.$lang->code.']',
					// 'attribute'=>'['.$lang->code.']content', // model atribute
					'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
					'return'=>TRUE, // Toolbar settings (full, basic, advanced)
					'contentCSS'=>Yii::app()->baseUrl.'/asset/css/styles-text.css',
				));
				
			} else {
				$textField = CHtml::textField('Setting['.$value['data']->name.']['.$lang->code.']', $v->value, array('class'=>'span5'));
			}
			if (isset($tabs[$lang->code])) {
				$tabs[$lang->code]['content'] .= '
					<div class="control-group ">
						<label for="Setting_'.$value['data']->name.'_'.$lang->code.'" class="control-label required">'.$value['data']->name.'<span class="required"></span></label>
						<div class="controls">
							'.$textField.'
						</div>
					</div>		
				';
			}else{
				$tabs[$lang->code] = array('label'=>$lang->name, 'content'=>'
					<div class="control-group ">
						<label for="Setting_'.$value['data']->name.'_'.$lang->code.'" class="control-label required">'.$value['data']->name.'<span class="required"></span></label>
						<div class="controls">
							'.$textField.'
						</div>
					</div>		
				'
			        , 'active'=>($k=='id')?TRUE:false,
			    );
			}
		}
		?>
		<?php endif ?>
	<?php endforeach ?>
	<?php if (count($tabs)>0): ?>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>$tabs,
	)); ?>
	<?php endif ?>


	<?php foreach ($model as $key => $value): ?>
		<?php if ($value['data']->dual_language=='n'): ?>
		<div class="control-group ">
			<label for="Setting_<?php echo $value['data']->name ?>" class="control-label required"><?php echo $value['data']->name ?><span class="required"></span></label>
			<div class="controls">
				<?php if ($value['data']->type=='textarea'): ?>
				<?php echo CHtml::textArea('Setting['.$value['data']->name.']', $value['data']->value, array('class'=>'span5')) ?>
				<?php elseif ($value['data']->type=='ckeditor'): ?>
				<?php echo CHtml::textArea('Setting['.$value['data']->name.']', $value['data']->value) ?>
				<?php
				$this->widget('application.extensions.extckeditor.ExtCKEditor', array(
					'attribute'=>'Setting['.$value['data']->name.']',
					// 'attribute'=>'['.$lang->code.']content', // model atribute
					'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
					'return'=>TRUE, // Toolbar settings (full, basic, advanced)
					'contentCSS'=>Yii::app()->baseUrl.'/asset/css/styles-text.css',
				));
				?>
				<?php else: ?>
				<?php echo CHtml::textField('Setting['.$value['data']->name.']', $value['data']->value, array('class'=>'span5')) ?>
				<?php endif ?>
			</div>
		</div>		
		<?php endif ?>
	<?php endforeach ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
