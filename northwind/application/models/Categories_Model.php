<?php 
	class Categories_Model extends CI_Model
	{
		public $categoryName;
		public $description;
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	}
?>