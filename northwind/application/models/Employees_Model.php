<?php
		class Employees_Model extends CI_Model
		{
			public function __construct()
			{
					    parent::__construct();
                        $this->load->database();
			}
			public function getAll()
			{
				$query = $this->db->get("employees");
				return $query->result();
			}
			public function getById($id)
			{
				$this->db->from("employees");
				$this->db->where('id',$id);
				$query = $this->db->get();
				return $query->result();
			}
			public function getByQuery()
			{
				  $obj=json_decode(file_get_contents('php://input'));
				  $where = array();
				  if($obj->first_name !='')
				  {
				  		$where['first_name like ']='%'.$obj->first_name .'%';
				  }
				  if($obj->last_name != '')
				  {
				  		$where['last_name like ']='%'.$obj->last_name .'%';
				  }
				 
				  if($obj->department_id!=0)
				  {
				  		$where['department.id']=$obj->department_id;
				  }
				  $this->db->from("employees");
				  $this->db->join('department','employees.department_id=department.id','left');
				  $this->db->join("country",'employees.country_id =country.id','left');
				  $this->db->join('city','employees.city_id=city.id','left');
				  $this->db->join('region','employees.region_id=region.id','left');
				  $this->db->where($where);
				  $this->db->select('employees.id,employees.first_name,employees.last_name,department.name as department_name,country.name as country_name,city.name as city_name,region.name as region_name');
				  $query = $this->db->get();
				  return $query->result();
			}
			public function save()
			{
				 $obj=json_decode(file_get_contents('php://input'));
				 if($obj->id ==0)
				 {
				 	$this->db->insert('employees',$obj);
				 	$id=   $this->db->insert_id();
				 	foreach($obj->territories as $item)
				 	{
				 		$this->db->insert('employees_territories',
				 			array(
				 					'employee_id'=>$id,
				 					'territory_id'=>$item->id
				 				)
				 		);
				 	}
				 	return $id;
				 }else
				 {
				 	$this->db->update('employees',$obj,array('id'=>$obj->id));
				 	$this->db->from("employees_territories");
				 	$this->db->where('employee_id',$obj->id);
				 	$territory_query = $this->db->get();
				 	$territory_result = $territory_query->result();
				 	foreach($territory_result as $item)
				 	{
				 			$hasValue = $htis->findDb($item->territory_id,$obj);
				 			if($hasValue==false)
				 			{
				 				$this->db->delete('employees_territories',array(
				 						'employee_id'=>$obj->id,
				 						'territory_id'=>$item->territory_id
				 					));
				 			}
				 	}
				 	foreach($obj->territories as $item)
				 	{
				 		$this->db->from('employees_territories');
				 		$this->db->where(array(
				 				'employee_id'=>$obj->id,
				 				'territory_id'=>$item->id
				 			));
				 		$query_territory_insert = $this->db->get();
				 		$result_territory_insert = $query_territory_insert->result();
				 		if(count($result_territory_insert)==0)
				 		{
				 			$this->db->insert('employees_territories',
				 				array(
				 						'employee_id'=>$obj->id,
				 						'territory_id'=>$item->id
				 					));
				 		}
				 	}
				 	return $obj->id;

				 }
			}
			private function findDb($territory_id,$obj)
			{
					foreach($obj->territories as $item)
					{
						if($item->id == $territory_id)
						{
							return true;
						}
					}
					return false;
			}
		}