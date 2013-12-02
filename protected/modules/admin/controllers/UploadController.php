<?php

class UploadController extends ControllerAdmin
{

	public function actions() {
        return array(
            'upload'=>'application.controllers.upload.UploadFileAction',
        );
    }
    
}
