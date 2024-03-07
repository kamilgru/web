<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;

class CIFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($arguments[0] == 'guest' ){
			if( CIAuth::check() ){
				return redirect()->route('admin.home');
			}
		}
		// done work on routes to route it and filters to add the filter
        if ($arguments[0] == 'auth' ){
			if( !CIAuth::check() ){
				return redirect()->route('admin.login.form')->with('fail', 'you must be logged in');
			}
		}
	}

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}