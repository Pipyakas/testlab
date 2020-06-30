<?php
class home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if (isset($_SESSION['user'])) { 
			$this->render_frontend_tp('frontends/product/index_logined', null);
		} else { 
			$this->render_frontend_tp('/frontends/product/index', null);
		}
	}
}
