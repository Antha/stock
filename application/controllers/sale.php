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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
