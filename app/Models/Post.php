<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
	
	protected $table = 'posts';
	protected $priamryKey = 'id';
	protected $allowedFields = [
	 'title',
	 'genre',
	 'description',
	 'image',
	];
	
}