<?php
	
	class Country_Model extends CI_Model
	{
		public $id;
		public $name;
		public function __construct()
		{
			 parent::__construct();
             $this->load->database();
		}
		public function getAll()
		{
			$query = $this->db->get("country");
			return $query->result();
		}
	}