<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class Karirr extends CFormModel
{
	public $name;
	public $email;
	//public $subject;
	public $telp;
	public $cv;
	public $body;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, body, telp', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('cv', 'file', 'types'=>'doc, pdf, docx, rar, zip'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
			'telp'=>'Telephone',
			'name'=>'Full Name',
			'email'=>'Email',
			'body'=>'Message',
			'cv'=>'File CV',
		);
	}

	
}