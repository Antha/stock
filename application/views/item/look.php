<h1 style="background: #FF9558;text-align: center;color: white;border-radius: 20px; padding: 10px;">
	Master Barang
</h1>

<div id="body" style="margin-bottom:45px">
    <table class="table table-striped">
        <tr>
            <td>Kode Item</td>
            <td>Name Item</td>
            <td>Harga Jual</td>
            <td>Harga Beli</td>
            <td>Stock</td>
            <td>Kategori</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
<?php foreach($result->result_array() as $row) {?>
        <tr>
            <td><?php echo $row["ITEM_CODE"]?></td>
            <td><?php echo $row["ITEM_NAME"]?></td>
            <td><?php echo $row["ITEM_SALE"]?></td>
            <td><?php echo $row["ITEM_PRICE"]?></td>
			<td><?php echo $row["ITEM_UNIT"]?></td>
			<td><?php echo $row["ITEM_CATEGORY"]?></td>
			<td><?php echo anchor("item/edit/".$row["ITEM_CODE"],"Edit")?></td>
			<td><?php echo anchor("item/delete/".$row["ITEM_CODE"],"Delete")?></td>
		</tr>
<?php } ?>
    </table>
</div>
