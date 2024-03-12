<?php

namespace App\Controllers;

use App\Libraries\CIAuth;
use App\Models\Post;
use App\Models\Ajaxsearch_model;

class AdminController extends BaseController
{
    public function index()
    {
		$model = new Post();
		$data['post'] = $model->orderBy('id', 'DESC')-> findAll(); //
		return view('home', $data);
    }
	
	public function logoutHandler(){
		CIAuth::forget();
		return redirect()->route('admin.login.form')->with('fail','you are logged out');
	}
	
	public function addPost()
	{
		return view('new-post');
	}
	
	public function store()
	{
		$post = new post();
		$data = [
		'title' => $this->request->getPost('title'),
		'genre' => $this->request->getPost('genre'),
		'description' => $this->request->getPost('description'),
		];
		$post->save($data);
		return redirect('admin/new-post')->with('status','inserted successfully');
	}
}
