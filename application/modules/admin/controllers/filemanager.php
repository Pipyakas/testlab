<?php
/**
 *
 */
class filemanager extends  MY_Controller{

	function __construct() {
		parent::__construct();
	}

	function index(){
		if(isset($_SESSION['user'])){
			$data['heading']=$this->lang->line('msg_hotline');
	    	$this->render_backend_tp('backends/filemanager/index',$data);
     	}
	}

	function elfinder_init() {
		if(isset($_SESSION['user'])){
		     $this -> load -> helper('path');
		     $opts = array(
		// 'debug' => true,
		 	'roots' => array( array('driver' => 'LocalFileSystem',
				'path' => set_realpath('uploads'), 
				'URL' => base_url() . '/uploads/'
		// more elFinder options here
				)));
		     $this -> load -> library('elfinder_lib', $opts);
	    }
    }

}
?>
