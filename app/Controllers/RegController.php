<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegisterModel;

class RegController extends BaseController
{
	public $registerModel;
	public $session;
	public function __construct() {
		helper('form');
		$this->registerModel = new RegisterModel();
		$this->session = \Config\Services::session();
	}
	
    protected $helpers = ['url', 'form'];

public function index(){
	$data = [];
    $data['validation'] = null;
    if ($this->request->getMethod() == 'post')
    {
        $rules = [
            'fullname' => 'required|min_length[4]|max_length[20]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|min_length[4]|max_length[20]',
            'password' => 'required|min_length[6]|max_length[16]',	
        ];
        if ($this->validate($rules))
        {
			$userdata = [
				'name' => $this->request->getVar('fullname'),				
				'username' => $this->request->getVar('username',FILTER_SANITIZE_STRING),
				'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
				'email' => $this->request->getVar('email')
			];
			if($this->registerModel->createUser($userdata))
			{
				print "Account Created Succesfully";
			}
			else
			{
				$this->session->setTempdata('error','sorry try again',3);
				return redirect()->to(current_url());
			}
		}
        else
        {
            $data['validation'] = $this->validator;
        }
    }
    return view("register", $data);
 }
}
