<?php
/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 
 * 'YumRegistrationController'.
 * @package Yum.models
 */
class YumRegistrationForm extends YumUser {
	public $terms;
	public $verifyPassword;
	public $verifyCode; // Captcha

	public function rules() 
	{
		$rules = parent::rules();

		$rules[] = array('email', 'required');
		$rules[] = array('email', 'email');
		// password requirement is already checked in YumUser model, its sufficient
		// to check for verifyPasswort here
		$rules[] = array('verifyPassword', 'required');
		$rules[] = array('password', 'compare',
				'compareAttribute'=>'verifyPassword',
				'message' => Yum::t("Retype password is incorrect."));
		if(Yum::module('registration')->enableCaptcha)
			$rules[] = array('verifyCode', 'captcha',
					'allowEmpty'=>CCaptcha::checkRequirements()); 

		return $rules;
	}

	public static function genRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$string ='';    
		for ($p = 0; $p < $length; $p++)
		{
			$string .= $characters[mt_rand(0, strlen($characters)-1)];
		}
		return $string;
	}
}
