<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller {

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
		$this->load->model('Modsale');
		$this->load->model('Moditem');
		$this->load->library("form_validation");
		$this->load->library("session");
		$this->load->library('upload');
	}

	function index()
	{
		$data["sale_name"] = "";
		$data["sale_item"] = "";
		$data["sale_count"] = "";
		$data["sale_ktp"] = "";
		$data["alert"] = "";

		$this->template->displayuser("sale/add",$data);
	}

	function refreshData()
	{
		$result_sale = $this->Moditem->look();

		$sale_table = "<tr>
		                    <td>Kode Item</td>
		                    <td>Name Item</td>
		                    <td>Harga Jual</td>
		                    <td>Harga Beli</td>
		                    <td>Stock</td>
		                    <td>Kategori</td>
							<td>Beli</td>
		                </tr>";

		foreach($result_sale->result_array() as $row)
		{
			$sale_table .= "<tr>";
			$sale_table .= "<td>".$row["ITEM_CODE"]."</td>";
			$sale_table .= "<td>".$row["ITEM_NAME"]."</td>";
			$sale_table .= "<td>".$row["ITEM_SALE"]."</td>";
			$sale_table .= "<td>".$row["ITEM_PRICE"]."</td>";
			$sale_table .= "<td>".$row["ITEM_UNIT"]."</td>";
			$sale_table .= "<td>".$row["ITEM_CATEGORY"]."</td>";
			$sale_table .= "<td><button name='idcode' onclick='buy(".$row["ITEM_CODE"].")'?>
				            Beli</button></td>";
			$sale_table .= "/<tr>";
		}

		$data["sale_table"] = $sale_table;

		echo json_encode($data);
	}

	function chooseitem()
	{
		$item_code = $this->input->post("item_code");

		$result = $this->Moditem->look_id($item_code);

		foreach($result->result_array() as $row)
		{
			$data["sale_item"] = $row["ITEM_NAME"];
			$data["sale_count"] = $row["ITEM_UNIT"];
		}

		echo json_encode($data);
	}

	function additem()
	{
		$config['upload_path'] = './upload_image/';
		$config['allowed_types'] = 'jpeg|jpg|gif|png|JPG|PNG|JPEG|';
		$config['max_size'] = '100024';
		$this->upload->initialize($config);

		if($this->upload->do_upload('file_pic')){
			$data['pic'] = $this->upload->data();
			$data['pic_name'] = $data['pic']['file_name'];
		}else{
			$data['alert'] = $this->upload->display_errors();
		}

		$data_insert = array("IDCARD"=>$this->input->post("sale_ktp"),
	                         "NAME"=>$this->input->post("sale_name"),
							 "COUNT"=>$this->input->post("sale_count"),
							 "PHOTO"=>$data['pic_name'],
							 "IDITEM"=>$this->input->post("sale_id")
						 );

		$this->Modsale->add($data_insert);
		echo json_encode($data);
	}

	function viewcustomer()
	{
		$this->template->displayuser("sale/customer");
	}

	function getcustomer()
	{
		$result_sale = $this->Modsale->look();

		$sale_table = "<tr>
		                    <td>No. Fack</td>
		                    <td>Date. Fack</td>
		                    <td>Nik</td>
		                    <td>Nama</td>
		                    <td>Jumlah Barang</td>
							<td>Lihat Detail</td>
		                </tr>";

		foreach($result_sale->result_array() as $row)
		{
			$sale_table .= "<tr>";
			$sale_table .= "<td>".$row["NO_FACK"]."</td>";
			$sale_table .= "<td>".$row["DATE_FACK"]."</td>";
			$sale_table .= "<td>".$row["IDCARD"]."</td>";
			$sale_table .= "<td>".$row["NAME"]."<br/><img src='".base_url()."upload_image/".$row["PHOTO"]."' style='width:100px'/></td>";
			$sale_table .= "<td>".$row["COUNT"]."</td>";
			$sale_table .= "<td><button onclick='detail(".$row["NO_FACK"].")'?>
			                Lihat Detail</button></td>";
			$sale_table .= "</tr>";
		}

		$data["sale_table"] = $sale_table;

		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
