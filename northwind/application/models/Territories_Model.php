<?php
	class Territories_Model extends CI_Model
	{
		public function __construct()
		{
				 parent::__construct();
                  $this->load->database();
		}
		public function getAll()
		{
				$query = $this->db->get("territories");
				return $query->result();
		}
		public function getById($id)
		{
				$this->db->from("territories");
				$this->db->where(array(
						'id'=>$id
					));
				$query = $this->db->get();
				return $query->result();
		}
		public function getByQuery()
		{
			$obj=json_decode(file_get_contents('php://input'));
			$where = array();
			if($obj->name!='')
			{
				$where['territories.name like ']= '%'.$obj->name.'%';
			}
			if($obj->region_id!=0)
			{
				$where['region_id']=$obj->region_id;
			}
			$this->db->from("territories");
			$this->db->join('region','territories.region_id=region.id');
			$this->db->select('territories.id,territories.name,region.name as region_name');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		public function save()
		{
				 $obj=json_decode(file_get_contents('php://input'));
				 if($obj->id==0)
				 {
				 	$this->db->insert("territories",$obj);
				 	return $this->db->insert_id();
				 }else
				 {
				 	$this->db->update("territories",$obj,array('id'=>$obj->id));
				 	return $obj->id;
				 }
		}
		public function remove()
		{
			
		}
	}