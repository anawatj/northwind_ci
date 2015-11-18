<?php
		class Territories extends CI_Controller
		{

			public function entry()
			{

			}
			public function show()
			{

			}
			public function all()
			{
					$ret = $this->territories->getAll();
					echo json_encode($ret);
					
			}
			public function single()
			{
					$id=$this->input->get('key');
					$ret = $this->territories->getById($id);
					echo json_encode($ret[0]);

			}
			public function save()
			{
					$this->db->trans_start();
					$ret = $this->territories->save();
					$this->db->trans_complete();
					echo $ret;
			}
			public function remove()
			{

			}
		}