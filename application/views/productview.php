<div style="padding:60px; background:#F6F6F6; border:1px solid #E4E4E4; ">
    <h1 style="">Product Versions: </h1>
    <table summary="Product Versions" id="box-table-a" style="padding:10px; background:#F6F6F6; border:1px solid #E4E4E4;
                                                          width:80% ">
        <thead style="">
        <tr>
            <th scope="col">Version</th>
            <th scope="col">Group ID</th>
            <th scope="col">Product ID</th>
            <th scope="col">Title</th>
            <th scope="col">Store</th>
            <th scope="col">Shipping Duration</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Sub Category</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $index = 1;
foreach($product as $simple):
 ?>
    <tr>
        <td style="text-align: center"><?php echo $index++; ?></td>
        <td style="text-align: center"><?php echo $simple->group_id ?></td>
        <td style="text-align: center"><?php echo $simple->product_id ?></td>
        <td style="text-align: center"><?php echo $simple->title ?></td>
        <td style="text-align: center"><?php echo $simple->store ?></td>
        <td style="text-align: center"><?php echo $simple->shipping_duration ?></td>
        <td style="text-align: center"><?php echo number_format((float)$simple->price, 2, '.', ''); ?></td>
        <td style="text-align: center"><?php echo $simple->subcategory; ?></td>
        <td style="text-align: center"><?php echo $simple->category; ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<?php

