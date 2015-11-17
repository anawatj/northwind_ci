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

		}
		public function save()
		{

		}
		public function delete()
		{

		}
	}