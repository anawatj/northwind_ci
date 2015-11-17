<?php
	class Customers extends CI_Controller
	{

		public function entry()
		{

		}
		public function show()
		{

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