<?php
	class Categories extends CI_Controller 
	{
			public function index()
			{
				echo "hello world";
			}
			public function entry()
			{
				$this->layout->name="default";
				$this->layout->view('categories/entry');
			}
			public function show()
			{
				$this->layout->name="default";
				$this->layout->view('categories/show');
			}
			public function save()
			{

				$ret = $this->categories->save();
				echo $ret;
				
			}
			public function single()
			{
				$ret = $this->categories->getById($this->input->get('key'));
				echo json_encode($ret[0]);
			}
			public function all()
			{
				$ret = $this->categories->getAll();
				echo json_encode($ret);
			}
			public function search()
			{
				$ret= $this->categories->getByQuery();
				echo json_encode($ret);
			}
	}
