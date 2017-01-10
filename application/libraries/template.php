<?php

class Template
{

	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function displayuser($pagename, $data=null)
	{
		$data['_header'] = $this->_ci->load->view('template/header_user',$data,true);

		$data['_content'] = $this->_ci->load->view($pagename,$data,true);

		$data['_right_menu'] = $this->_ci->load->view('template/sidebar',$data,true);

		$data['_footer'] = $this->_ci->load->view('template/footer',$data,true);

		$this->_ci->load->view("template.php",$data);
	}

	function displayadmin($pagename, $data=null)
	{
		$data['_header'] = $this->_ci->load->view('template/header_admin',$data,true);

		$data['_content'] = $this->_ci->load->view($pagename,$data,true);

		$data['_right_menu'] = $this->_ci->load->view('template/sidebar',$data,true);

		$data['_footer'] = $this->_ci->load->view('template/footer',$data,true);

		$this->_ci->load->view("template.php",$data);
	}


}


?>
