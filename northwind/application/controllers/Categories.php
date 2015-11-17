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

				$ret = $this->categories->save_entry();
				echo $ret;
				
			}
			public function single()
			{
				$ret = $this->categories->get_by_id($this->input->get('key'));
				echo json_encode($ret[0]);
			}
			public function all()
			{
				$ret = $this->categories->get_all_entries();
				echo json_encode($ret);
			}
	}
