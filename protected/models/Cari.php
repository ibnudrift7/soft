<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class Cari extends CFormModel
{
	public $kegunaan;
	public $merk;
	public $type;

	public function rules()
	{
		return array(
			array('kegunaan, merk, type', 'required'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'kegunaan'=>'Kegunaan',
			'merk'=>'Merk',
			'type'=>'Type',
		);
	}
}