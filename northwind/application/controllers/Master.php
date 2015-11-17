<?php
	class Master extends CI_Controller
	{
		public function getAllCountry()
		{
			$ret= $this->country->getAll();
			echo json_encode($ret);

		}
		public function getAllRegion()
		{
			$ret = $this->region->getAll();
			echo json_encode($ret);
		}
		public function getAllCity()
		{
				$id = $this->input->get('id');
				$ret = $this->city->getAll($id);
				echo  json_encode($ret);
		}
		public function getAllDemographic()
		{
			$ret = $this->demographic->getAll();
			echo json_encode($ret);
		}
	}