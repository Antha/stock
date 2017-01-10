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
	$("input[name=sale_ktp]").keyup(function(){
		if(isNaN($(this).val()))
		{
			alert("Silahkan Masukan Nomor Pada Kartu Identitas");
			$(this).val("");
		}
	});
});

function refreshData(){
	jQuery.ajax({
		url:"<?php echo base_url();?>index.php/sale/refreshData",
		dataType:"json",
		success:function(res){
			jQuery("table.sale-data").html(res.sale_table);
		}
	});
}

setInterval(refreshData,500);

</script>

<div class="main-slide">
</div>

<h1 style="background: #FF9558;text-align: center;color: white;border-radius: 20px; padding: 10px;">
	Silahkan Dibeli
</h1>

<div id="body" style="margin-bottom:45px">
<table class="table table-striped">
<?php
echo form_open_multipart();
$atribute = array(
'name'  => 'sale_ktp'
);
echo "<tr><td>No. Kartu Identitas </td><td>".form_input('sale_ktp')."</td></tr>";
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
echo form_close();
echo "<br/>".$alert;
?>
</table>
<br/>
<table class="sale-data table table-striped" border="1">

</table>
</div>
