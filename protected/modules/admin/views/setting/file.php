<?php
$this->breadcrumbs=array(
	'Settings',
);

$this->menu=array(
	// array('label'=>'Add Setting', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<h1>File Edit</h1>
<?php $this->widget('application.extensions.fileeditor.fileeditor', array(
    'editableFolders'=>array(
            // array('path'=>"asset/css", 'label'=>'CSS'),
            array('path'=>"protected/messages/en", 'label'=>'English'),
            array('path'=>"protected/messages/id", 'label'=>'Indonesia'),
            array('path'=>"protected/messages/ja", 'label'=>'Japanese'),
            array('path'=>"protected/messages/zn_ch", 'label'=>'Chinese'),
    ),
    'options'=>array(
        'name'=>'editor',
        'class'=>'editor',
        'editorwidth'=> '910',
        'min_width'=>'910',
        'min_height'=>'500',
        'cols'=>100,
        'rows'=>30,
        'language'=>'en',
        'syntax'=> 'php',
        'allow_resize'=>'y',
        'is_editable'=>true,
        'word_wrap'=>'true',
        'allow_toggle'=>true,
        'start_highlight'=>true,
        'toolbar'=>'new, load, save, |, search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, word_wrap, |, help',
        'plugins'=>'new',
        'load_callback'=> 'loadFileEditor',
        'save_callback'=> 'saveFileEditor',
        'EA_load_callback'=>'setEditorId',
        'EA_file_close_callback'=>'closeFileEditor',
        'is_multi_files'=> true
        )
    )
); ?>