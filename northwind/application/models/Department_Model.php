<?php
	class Department_Model extends CI_Model
	{
		public function __construct()
		{
			   parent::__construct();
               $this->load->database();
		}
		public function getAll()
		{
			$query = $this->db->get("department");
			return $query->result();
		}
	}