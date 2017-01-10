<h1 style="background: #FF9558;text-align: center;color: white;border-radius: 20px; padding: 10px;">
	Master Barang
</h1>

<div id="body" style="margin-bottom:45px">

<table class="table table-striped">

<?php

echo form_open_multipart('item/edit_do');
foreach($result->result_array() as $row)

$atribute = array(
'name'  => 'item_code',
'value' => $row["ITEM_CODE"],
'type'  => 'hidden'
);
echo form_input($atribute);

echo "<tr><td>Nama Barang </td><td>".form_input('item_name',$row["ITEM_NAME"])."</td></tr>";

$atribute = array(
'name'  => 'item_sale',
'value' => $row["ITEM_SALE"],
'type'  => 'number'
);
echo "<tr><td>Harga Jual </td><td>".form_input($atribute)."</td></tr>";

$atribute = array(
'name'  => 'item_price',
'value' => $row["ITEM_PRICE"],
'type'  => 'number'
);
echo "<tr><td>Harga Beli </td><td>".form_input($atribute)."</td></tr>";

$atribute = array(
'name'  => 'item_unit',
'value' => $row["ITEM_UNIT"],
'type'  => 'number'
);
echo "<tr><td>Satuan </td><td>".form_input($atribute)."</td></tr>";

echo "<tr><td>Kategori </td><td>".form_input('item_category',$row["ITEM_CATEGORY"])."</td></tr>";

echo "<tr></td><td>".form_submit('submit','Simpan Perubahan');

echo "</table>";

echo "<br/>".$alert;

?>

</div>
