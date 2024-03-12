<?php
namespace App\Models;

use CodeIgniter\Model;

class Ajaxsearch_model extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("posts");
		if($query != '')
		{
			$this->db->like('title', $query);
			$this->db->or_like('genre', $query);
			$this->db->or_like('description', $query);
		}
		return $this->db->get();
	}
}
?>