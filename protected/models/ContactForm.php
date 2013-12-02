<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $how;
	public $subject;
	public $body;
	public $telp;
	public $verifyCode;

	public $jeniskelamin;
	public $umur;

	public $tanggal1;
	public $tanggal2;
	public $jam1;
	public $jam2;

	public $ask;
	public $record;
	public $service;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, body', 'required', 'on'=>'insert'),
			array('name, email, jeniskelamin, umur, telp, subject,  ask', 'required', 'on'=>'ask'),
			// email has to be a valid email address
			array('email', 'email'),
			array('tanggal1, tanggal2, jam1, jam2, how, jeniskelamin, umur, telp, subject, ask, record, service', 'safe'),
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
			'verifyCode'=>Yii::t('main', 'Verification Code'),
			'body'=>Yii::t('main', 'Messages'),
			'how'=>Yii::t('main', 'How do you find us'),
			'tanggal1'=>Yii::t('main', 'Tanggal yang diharapkan'),
			'tanggal2'=>Yii::t('main', 'Atau tanggal'),
			'jam1'=>Yii::t('main', 'Jam yang diharapkan'),
			'jam2'=>Yii::t('main', 'Hingga jam'),
			'ask'=>Yii::t('main', 'Pertanyaan'),
			'name'=>Yii::t('main', 'Name'),
			'email'=>Yii::t('main', 'Email'),
			'record'=>Yii::t('main', 'Medical Record'),
			'jeniskelamin'=>Yii::t('main', 'Jenis Kelamin'),
			'umur'=>Yii::t('main', 'Umur'),
			'telp'=>Yii::t('main', 'Phone'),
			'subject'=>Yii::t('main', 'Subject'),
			'service'=>Yii::t('main', 'Service'),
		);
	}
}