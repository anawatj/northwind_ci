<?php
	class Customers_Model extends CI_Model
	{
		public $id;
		public $company_name;
		public $contact_name;
		public $contact_title;
		public $address;
		public $city_id;
		public $region_id;
		public $postal_code;
		public $country_id;
		public $phone;
		public $fax;

		public function __construct()
		{
			       parent::__construct();
                   $this->load->database();
		}
		public function getAll()
		{
				$query = $this->db->get("customers");
				return $query->result();
		}
		public function getById($id)
		{
				$this->db->from("customers");
				$this->db->where('id',$id);
				$query =  $this->db->get();
				return $query->result();
		}
		public function getByQuery()
		{
				$obj=json_decode(file_get_contents('php://input'));
				$this->db->from("customers");
				$this->db->join('city','customers.city_id=city.id','left');
				$this->db->join('country','customers.country_id=country.id','left');
				$this->db->join('region','customers.region_id=region.id','left');
				$where = array();
				if($obj->company_name!='')
				{
					$where['company_name like']='%'.$obj->company_name.'%';
				}
				if($obj->contact_name!='')
				{
					$where['contact_name like']='%'.$obj->contact_name.'%';
				}
				if($obj->contact_title!='')
				{
					$where['contact_title like']='%'.$obj->contact_title.'%';
				}
				if($obj->country_id != 0 )
				{
					$where['country.id']=$obj->country_id;

				}
				if($obj->city_id!=0)
				{
					$where['city.id=']=$obj->city_id;
				}
				if($obj->region_id!=0)
				{
					$where['region.id=']=$obj->region_id;
				}
				$this->db->where($where);
		
				$this->db->select('customers.id,company_name,contact_name,contact_title,region.name as region_name,country.name as country_name,city.name as city_name');
				$query =$this->db->get();
				return $query->result();
		}
		public function save()
		{
			$obj=json_decode(file_get_contents('php://input'));
			if($obj->id==0)
			{
				$this->db->insert('customers',$obj);
				$id=   $this->db->insert_id();
				foreach($obj->demos as $item)
				{
					$this->db->insert("customers_demographics",
						array(
							'customer_id'=>$id,
							'demographic_id'=>$item->id
							));
				}
				return $id;
			}else
			{
				$this->db->update('customers',$obj,array('id'=>$obj->id));
				$this->db->from('customers_demographics');
				$this->db->where('customer_id',$obj->id);
				$query_demo_db = $this->db->get();
				$result_demo_db = $query_demo_db->result();
				foreach($result_demo_db as $item)
				{
					$hasValue = $this->findDemoDb($item->demographic_id,$obj);
					if($hasValue==false)
					{
						$this->db->delete('customers_demographics',array(
								'customer_id'=> $obj->id,
								'demographic_id'=>$item->demographic_id
							));
					}
				}
				foreach ($obj->demos as $item) {
					$this->db->from('customers_demographics');
					$this->db->where(
							array(
									'customer_id'=>$obj->id,
									'demographic_id'=>$item->id
								)
						);
					$query = $this->db->get();
					$demo_result = $query->result();
					if(count($demo_result)==0)
					{
						$this->db->insert("customers_demographics",
						array(
								'customer_id'=>$obj->id,
								'demographic_id'=>$item->id
							));
					}
					# code...
				}
				return  $obj->id;

			}
		}
		public function remove()
		{

		}
		private function findDemoDb($demographic_id,$obj)
		{
			foreach($obj->demos as $item)
			{
				if($item->id==$demographic_id)
				{
					return true;
				}
			}
			return false;
		}

		
	}