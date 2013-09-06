<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ApiLoginForm extends CFormModel
{
	public $username;
	public $password;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
            return array(
            );
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
            $akun = Akun::model()->find("nama = :nama and password = :password",array(
                ':nama'=>$this->username,
                ':password'=>md5($this->password)
            ));
            if($akun){
                return $akun;
            }
            else{
                return false;
            }
	}
}
