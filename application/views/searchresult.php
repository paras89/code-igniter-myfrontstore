<?php
$currentGroup = '';
foreach($products as $key => $product)
{
    $groupId = $product->group_id;

    if($currentGroup != $product->group_id && isset($groupId))
    {
        $currentGroup = '';
    }

    if(isset($groupId) && $currentGroup == '')
    {
        $currentGroup  = $product->group_id;
        $id = $product->id;

    echo "<a href=\"viewproduct?id=$id\">$product->title</a>
          <br/>";
    }

}