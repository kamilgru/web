<?php

namespace App\Controllers;

use App\Libraries\CIAuth;

class AdminController extends BaseController
{
    public function index()
    {
		$data = [
			'pageTitle'=>'Dashboard',
		];
		return view('home', $data);
    }
	
	public function logoutHandler(){
		CIAuth::forget();
		return redirect()->route('admin.login.form')->with('fail','you are logged out');
	}
}
