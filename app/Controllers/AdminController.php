<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // Add this line
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
	{
		echo 'admin dashboard home'
	}
}