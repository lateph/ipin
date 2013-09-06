<?php

class ApiController extends Controller
{
	public function actionRegister()
	{
            $akun = new Akun('register');
            $akun->attributes = isset($_POST) ? $_POST : array();
            if($akun->save()){
                $akun->password = md5($akun->password);
                $akun->tanggalDaftar = new CDbExpression('now()');
                $akun->save();
                echo CJSON::encode(array(
                    'status'=>1,
                    'token'=>$akun->getToken()
                ));
            }
            else{
               echo CJSON::encode(array(
                    'status'=>0,
                    $akun->getErrors()
                ));
            }
	}
        
        public function actionLogin(){
            $login = new ApiLoginForm();
            $login->attributes = isset($_POST) ? $_POST : array();
            if($akun = $login->login()){
                echo CJSON::encode(array(
                    'status'=>1,
                    'token'=>$akun->getToken(),
                )); 
            }
            else{
                echo CJSON::encode(array(
                    'status'=>0,
                    $login->getErrors()
                ));
            }
        }
}