<h1 style="background: #FF9558;text-align: center;color: white;border-radius: 20px; padding: 10px;">
	Master Barang
</h1>

<div id="body" style="margin-bottom:45px">

<table class="table table-striped">

<?php

echo form_open_multipart('item/add');

echo "<tr><td>Nama Barang </td><td>".form_input('item_name',$item_name)."</td></tr>";

$atribute = array(
'name'  => 'item_price',
'value' => $item_price,
'type'  => 'number'
);
echo "<tr><td>Harga Beli </td><td>".form_input($atribute)."</td></tr>";

$atribute = array(
'name'  => 'item_sale',
'value' => $item_sale,
'type'  => 'number'
);
echo "<tr><td>Harga Jual </td><td>".form_input($atribute)."</td></tr>";

$atribute = array(
'name'  => 'item_unit',
'value' => $item_unit,
'type'  => 'number'
);
echo "<tr><td>Satuan </td><td>".form_input($atribute)."</td></tr>";

echo "<tr><td>Kategori </td><td>".form_input('item_category',$item_category)."</td></tr>";

echo "<tr></td><td>".form_submit('submit','Simpan Perubahan');

echo "<br/>".$alert;

?>
</table>

</div>
