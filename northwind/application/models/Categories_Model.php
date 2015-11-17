<?php 
	class Categories_Model extends CI_Model
	{
		public $id;
		public $name;
		public $description;
		public function __construct()
                {
                // Call the CI_Model constructor
                        parent::__construct();
                        $this->load->database();
                }
                public function get_all_entries()
                {
        	       $query=$this->db->get('categories',10);
        	       return $query->result();
                }
                public function get_by_id($id)
                {
                    $this->db->from('categories');
                    $this->db->where('id',$id);
                    $query =  $this->db->get();
                    return $query->result();
                }
                public function save_entry()
                {

        	        $obj=json_decode(file_get_contents('php://input'));
                        $this->name= $obj->name;
                        $this->description=$obj->description;
                        
                        if($obj->id==0)
                        {
                                
        	               $this->db->insert('categories',$obj);
                               return $this->db->insert_id();
                        }else
                        {
                                $this->id=$obj->id;
                                $this->db->update("categories",$this,array('id' => $this->id ));
                                $ret = $this->id;
                                return $this->id;

                        }
                    
        	
                }
                public function get_by_query()
                {
                    $obj=json_decode(file_get_contents('php://input'));
                    $this->db->from('categories');
                    $this->db->where(array(
                            'name like ' => '%'.$obj->name.'%',
                            'description like '=>'%'. $obj->description.'%'
                        ));
                    $query = $this->db->get();
                    return $query->result();
                }
	}
?>