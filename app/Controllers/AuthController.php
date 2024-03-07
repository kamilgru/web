<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\User;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function loginForm()
    {
        $data = [
            'pageTitle' => 'Login',
            'validation' => null
        ];
        return view('auth', $data);
    }
	
	public function loginHandler(){
		$fieldType = filter_var($this->request->getVar('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' :
		'username';
		
		if( $fieldType == 'email' ){
			$isValid = $this->validate([
				'login_id'=>[
					'rules'=>'required|valid_email|is_not_unique[users.email]',
					'errors'=>[
						'required'=>'Email is required',
						'valid_email'=>'please check the email field. it does not appear to be valid.',
						'is_not_unique'=>'Email does not exist in our system.'
						]
					],
					'password'=>[
					'rules'=>'required|min_length[5]|max_length[45]',
					'errors'=>[
						'required'=>'password is required',
						'min_length'=>'password must have at least 5 characters.',
						'max_length'=>'password must have max 45 characters.'
				]
			]
		]);
			
		}else{
			$isValid=$this->validate([
			'login_id'=>[
				'rules'=>'required|is_not_unique[users.username]',
				'errors'=>[
					'required'=>'username is required',
					'is_not_unique'=>'username does not exist in our system.'
					]
				],
				'password'=>[
				'rules'=>'required|min_length[5]|max_length[45]',
				'errors'=>[
					'required'=>'password is required',
					'min_length'=>'password must have at least 5 characters.',
					'max_length'=>'password must have max 45 characters.'
				]
			]
		]);
	}
		if( !$isValid ){
			return view('auth',[
			'pageTitle'=>'Login',
			'validation'=>$this->validator
			]);
		}else{
			echo 'form validated';
			$user = new User();
			$userInfo = $user->where($fieldType, $this->request->getVar('login_id'))->first();
			  $check_password = Hash::check($this->request->getVar('password'), $userInfo['password']);
			  
			if( !$check_password ){
				return redirect()->route('admin.login.form')->with('fail','Wrong password')->withInput();
			}else{
				CIAuth::setCIAuth($userInfo);
				return redirect()->route('admin.home');
			}
		}
	}
}
