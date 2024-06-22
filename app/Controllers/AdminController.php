<?php

namespace App\Controllers;

use App\Libraries\CIAuth;
use App\Models\Post;

class AdminController extends BaseController
{
    public function index()
    {
		return view('home');
    }
	
	
	public function logoutHandler(){
		CIAuth::forget();
		return redirect()->route('admin.login.form')->with('fail','You Are Logged Out');
	}
	
	public function addPost()
	{
		return view('new-post');
	}
	
	public function store()
	{
		$post = new Post();
		$data = [
		'title' => $this->request->getPost('title'),
		'genre' => $this->request->getPost('genre'),
		'description' => $this->request->getPost('description')
		];
		$post->save($data);
		$data = ['status'=>'Data Inserted'];
		return $this->response->setJSON($data);
	}
	
	public function fetch()
	{
		$post = new post();
		$data['post'] = $post->findall();
		return $this->response->setJSON($data);
	}
	
	public function edit()
	{
		$edit = new post();
		$id = $this->request->getPost('id');
		$data['edit'] = $edit->find($id);
		return $this->response->setJSON($data);
	}

	public function update()
	{
		$edit = new Post();
		$id = $this->request->getPost('id');
		$data = [
			'title' => $this->request->getPost('title'),
			'genre' => $this->request->getPost('genre'),
			'description' => $this->request->getPost('description')
		];
		$edit->update($id, $data);
		$message = ['status' => 'Updated Successfully'];
		return $this->response->setJSON($message);
	}
	
	public function delete()
	{
		$delete = new post();
		$delete->delete($this->request->getPost('id'));
		$message = ['status' => 'Deleted Successfully'];
		return $this->response->setJSON($message);
		
	}
}
