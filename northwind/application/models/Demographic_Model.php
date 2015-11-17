<?php 
	class Demographic_Model extends CI_Model
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
			$query = $this->db->get("demographic");
			return $query->result();
		}
		public function getByCustomers($id)
		{
			$this->db->from("demographic");
			$this->db->join('customers_demographics','demographic.id=customers_demographics.demographic_id');
			$this->db->where('customers_demographics.customer_id',$id);
			$this->db->select('demographic.id,demographic.name');
			$query = $this->db->get();
			return $query->result();
		}
	}