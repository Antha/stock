<script src="<?php echo base_url();?>public/jquery/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	refreshData();
});

function detail()
{
	alert("System masih dalam perbaikan");
}

function refreshData(){
	$.ajax({
		url:"<?php echo base_url();?>index.php/sale/getcustomer",
		dataType:"json",
		success:function(res){
			jQuery("table.sale-data").html(res.sale_table);
		}
	});
}

//setInterval(refreshData,500);
</script>

<div class="main-slide">
</div>

<h1 style="background: #FF9558;text-align: center;color: white;border-radius: 20px; padding: 10px;">
	Data Customer Terkini
</h1>
<div id="body" style="margin-bottom:45px">
<table class="sale-data table table-striped" border="1">
</table>
</div>
