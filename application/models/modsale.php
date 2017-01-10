<?php

class Modsale extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function Modsale()
	{
		parent::__construct();
	}

	function look()
 	{
 		$result = $this->db->query("select * FROM product");

 		return $result;
 	}

	function look_id($id)
	{
		$result = $this->db->query("select * FROM product where ITEM_CODE = ".$id);

 		return $result;
	}

 	function add($dbdata)
 	{
 		$this->db->insert("product",$dbdata);
 	}

	function edit($data,$id)
	{
		$this->db->where("ITEM_CODE",$id);
		$this->db->update("product",$data);
	}

	function del_id($id)
	{
		$this->db->where("ITEM_CODE",$id);
		$this->db->delete("product",$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
