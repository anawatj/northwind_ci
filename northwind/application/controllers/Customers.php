<?php
	class Customers extends CI_Controller
	{

		public function entry()
		{
				$this->layout->name="default";
				$this->layout->view('customers/entry');
		}
		public function show()
		{
				$this->layout->name="default";
				$this->layout->view('customers/show');
		}
		public function all()
		{
				$ret = $this->customers->getAll();
				echo json_encode($ret);
		}
		public function single()
		{
						$id=$this->input->get('key');
						$rets= $this->customers->getById($id);
						$ret=$rets[0];
						$demos = $this->demographic->getByCustomers($ret->id);
						$ret->demos = $demos;
						echo json_encode($ret);
		}
		public function search()
		{
				$ret = $this->customers->getByQuery();
				echo json_encode($ret);
		}
		public function save()
		{
				$ret = $this->customers->save();
				echo $ret;
		}
		public function delete()
		{

		}
	}