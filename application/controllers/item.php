<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

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

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->helper(array('url','form'));
		$this->load->model('Moditem');
		$this->load->library("form_validation");
		$this->load->library("session");
		$this->load->library('upload');
	}

	function index()
	{
        $data["item_name"] = "";
        $data["item_sale"] = "";
        $data["item_price"] = "";
        $data["item_unit"] = "";
        $data["item_category"] = "";
        $data["alert"] = "";

		$this->template->displayadmin("item/add",$data);
	}

    function add()
    {
        $this->form_validation->set_rules('item_name','Item Name','required');
		$this->form_validation->set_rules('item_sale','Item Sale','required');
        $this->form_validation->set_rules('item_price','Item Price','required');
        $this->form_validation->set_rules('item_unit','Item Unit','required');
        $this->form_validation->set_rules('item_category','Item Category','required');
		$data["item_name"] = $this->input->post('item_name');
		$data["item_sale"] = $this->input->post('item_sale');
        $data["item_price"] = $this->input->post('item_price');
		$data["item_unit"] = $this->input->post('item_unit');
        $data["item_category"] = $this->input->post('item_category');

        if($this->form_validation->run())
		{
            $data_arr = array('ITEM_NAME'=>$data["item_name"],
                        'ITEM_SALE'=>$data["item_sale"],
                        'ITEM_PRICE'=>$data["item_price"],
                        'ITEM_UNIT'=>$data["item_unit"],
                        'ITEM_CATEGORY'=>$data["item_category"],
                    );

            $this->Moditem->add($data_arr);

            $data["alert"] = "Sukses Upload Item";
        }
        else{
            $data["alert"] = "Gagal Nambah Item";
        }

        $this->template->displayadmin("item/add",$data);
    }

	function look()
	{
		$data['result'] = $this->Moditem->look();

		$this->template->displayadmin('item/look',$data);
	}

    function edit($id)
	{
		$data['alert'] = "";

		$data['result'] = $this->Moditem->look_id($id);

		$this->template->displayadmin('item/edit',$data);
	}

	function edit_do($id)
	{
		$this->form_validation->set_rules('item_name','Item Name','required');
		$this->form_validation->set_rules('item_sale','Item Sale','required');
        $this->form_validation->set_rules('item_price','Item Price','required');
        $this->form_validation->set_rules('item_unit','Item Unit','required');
        $this->form_validation->set_rules('item_category','Item Category','required');
		$data["item_name"] = $this->input->post('item_name');
		$data["item_sale"] = $this->input->post('item_sale');
        $data["item_price"] = $this->input->post('item_price');
		$data["item_unit"] = $this->input->post('item_unit');
        $data["item_category"] = $this->input->post('item_category');

        if($this->form_validation->run())
		{
            $data_arr = array('ITEM_NAME'=>$data["item_name"],
                        'ITEM_SALE'=>$data["item_sale"],
                        'ITEM_PRICE'=>$data["item_price"],
                        'ITEM_UNIT'=>$data["item_unit"],
                        'ITEM_CATEGORY'=>$data["item_category"],
                    );

            $this->Moditem->edit($data_arr,$this->input->post("item_code"));

            $data["alert"] = "Sukses Update Item";
        }
        else{
            $data["alert"] = "Gagal Update Item";
        }

        redirect("item/look");
	}

	function delete($id)
	{
		$data['result'] = $this->Moditem->del_id($id);

		redirect("item/look");
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
