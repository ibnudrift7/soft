 <?php
		foreach ($modelDesc as $key => $value) {
			// print_r($value->attributes);
			$lang = Language::model()->getName($key);
		        echo $form->textFieldRow($value,'['.$lang->code.']title',array('class'=>'span5','maxlength'=>100));
		        echo ((Yii::app()->user->checkAccess('page_editIntro'))?$form->textFieldRow($value,'['.$lang->code.']intro',array('class'=>'span5','maxlength'=>200)):'');
		        echo $form->textAreaRow($value,'['.$lang->code.']content',array('rows'=>6, 'cols'=>50, 'class'=>'span8'));        

			// $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
			// 	'model'=>$value,
			// 	'attribute'=>'['.$lang->code.']content', // model atribute
			// 	'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
			// 	'return'=>TRUE, // Toolbar settings (full, basic, advanced)
			// 	'contentCSS'=>Yii::app()->baseUrl.'/asset/css/styles-text.css',
			// ));


		}?>