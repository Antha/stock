<script src="<?php echo base_url();?>public/jquery/jquery.min.js"></script>
<script type="text/javascript">
function buy(itemid){
		jQuery.ajax({
		type:"POST",
		url:"<?php echo base_url();?>index.php/sale/chooseitem",
		dataType:"json",
		data:{item_code:itemid},
		success: function(res){
			var item_count_int;
			var html_sic = "";

			item_count_int = res.sale_count;

			for(var int = item_count_int; int >= 1; int--)
			{
				html_sic = html_sic + "<option value="+int+">"+int+"</option>";
			}

			jQuery("input[name=sale_item]").val(res.sale_item);
			jQuery("select[name=item_count]").html(html_sic);
		}
		});
}

$(document).ready(function(){
	jQuery.ajax({
		url:"<?php echo base_url();?>index.php/sale/refreshData",
		dataType:"json"
	});
});

</script>

<div class="main-slide">
<?php $this->load->view("sale/header")?>
</div>

<h1 style="background: #FF9558;text-align: center;color: white;border-radius: 20px; padding: 10px;">
	Silahkan Dibeli
</h1>

<div id="body" style="margin-bottom:45px">
<table class="table table-striped">
<?php
echo form_open_multipart();
echo "<tr><td>Nama Anda </td><td>".form_input('sale_name')."</td></tr>";
$atribute = array(
'name'  => 'sale_item'
);
echo "<tr><td>Nama Barang </td><td>".form_input($atribute)."</td></tr>";
echo "<tr><td>Jumlah Barang </td>";
?>
<td>
<select name="item_count">
</select>
</td>
<tr>
<?php
echo "<tr><td></td><td>".form_submit("submit","Submit")."</td></tr>";
echo form_close(
//echo "<br/>".$alert;
?>
</table>
<br/>
<table class="table table-striped sale-data" border="1">
<tr>
    <td>Kode Item</td>
    <td>Name Item</td>
    <td>Harga Jual</td>
    <td>Harga Beli</td>
    <td>Stock</td>
    <td>Kategori</td>
    <td>Beli</td>
</tr>
<?php foreach($result_sale->result_array() as $row) {?>
<tr>
    <td><?php echo $row["ITEM_CODE"]?></td>
    <td><?php echo $row["ITEM_NAME"]?></td>
    <td><?php echo $row["ITEM_SALE"]?></td>
    <td><?php echo $row["ITEM_PRICE"]?></td>
    <td><?php echo $row["ITEM_UNIT"]?></td>
    <td><?php echo $row["ITEM_CATEGORY"]?></td>
    <td><button name="idcode" onclick="buy(<?php echo $row["ITEM_CODE"]?>);">Beli</button></td>
</tr>
<?php } ?>
</table>
</div>
