<?php
		class Territories extends CI_Controller
		{

			public function entry()
			{
					$this->layout->name="default";
					$this->layout->view("territories/entry");
			}
			public function show()
			{
					$this->layout->name="default";
					$this->layout->view("territories/show");
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
			public function search()
			{
				$ret = $this->territories->getByQuery();
				echo json_encode($ret);

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