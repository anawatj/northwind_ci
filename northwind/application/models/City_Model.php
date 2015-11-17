<?php
	class City_Model extends CI_Model
	{
			public $id;
			public $name;
			public $country_id;
			public function __construct()
            {
            	 parent::__construct();
                 $this->load->database();
            }
            public function getAll($id)
            {
                $this->db->from("city");
                $this->db->where('country_id',$id);
            	$query = $this->db->get();
                return $query->result();
            }
	}