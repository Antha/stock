<script src="<?php echo base_url();?>public/jquery/jquery.min.js"></script>
<script type="text/javascript">
var my_item_id;

function buy(itemid){
		my_item_id = itemid;
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

	$('#file_pic').bind("change",function(e){
		var file = $(this).val();
		var path = URL.createObjectURL(e.target.files[0])
		$("img#sale_pic").attr("src",path);
	});

	$("input[type=submit]").click(function(){
		if($('input[name=sale_ktp]').val() == ""){
			alert("Silahkan masukan No. Kartu Identitas terlebih dahulu");
			return false;
		}
		if($('input[name=sale_name]').val() == ""){
			alert("Silahkan masukan Nama terlebih dahulu");
			return false;
		}
		if($("#file_pic").val() == ""){
			alert("Silahkan upload gambar terlebih dahulu");
			return false;
		}
		if($('input[name=item_count]').val() == ""){
			alert("Silahkan Pilih Jumlah Barang dan Barangnya");
			return false;
		}

		var formfile = new FormData();
		formfile.append("file_pic",$("#file_pic")[0].files[0]);
		formfile.append("sale_ktp",$('input[name=sale_ktp]').val());
		formfile.append("sale_name",$('input[name=sale_name]').val());
		formfile.append("sale_count",$('select[name=item_count]').val());
		formfile.append("sale_id",my_item_id);

		/*
		sale_ktp:$('input[name=sale_ktp]').val(),
		sale_name:$('input[name=sale_name]').val(),
		sale_count:$('select[name=item_count]').val(),
		sale_id:my_item_id,
		*/

		jQuery.ajax({
			type:"POST",
			url:"<?php echo base_url();?>index.php/sale/additem",
			dataType:"json",
			data:formfile,
			processData:false,
			contentType:false,
			success:function(data){
				alert("Berhasil Memasukkan Data");
			}
		});
	});

	refreshData();
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

setInterval(refreshData,5000);

</script>

<div class="main-slide">
</div>

<h1 style="background: #FF9558;text-align: center;color: white;border-radius: 20px; padding: 10px;">
	Silahkan Dibeli
</h1>

<div id="body" style="margin-bottom:45px">
<table class="table table-striped">
<?php
$atribute = array(
'name'  => 'sale_ktp'
);
echo "<tr><td>No. Kartu Identitas </td><td>".form_input('sale_ktp')."</td></tr>";
echo "<tr><td>Nama Anda </td><td>".form_input('sale_name')."</td></tr>";
$atribute = array(
'name'  => 'sale_pic',
'id' => 'file_pic',
'type' => 'file'
);
echo "<tr><td>Foto Profil </td><td>".form_input($atribute)."<img id='sale_pic' src='' width='200'/></td></tr>";
$atribute = array(
'name'  => 'sale_item',
'disabled' => 'disabled'
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
echo "<br/>".$alert;
?>
</table>
<br/>
<table class="sale-data table table-striped" border="1">

</table>
</div>
