<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // Add this line
use App\Controllers\BaseController;

class AuthController extends BaseController
{
	protected $helpers = '{'url','form'];
	
    public function loginform()
	{
		$data = [
			'pageTitle'=>'Login',
			'validation'=>null
			];
		return view('Views/pages/example-auth', $data);
	}
}